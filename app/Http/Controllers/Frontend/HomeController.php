<?php

namespace App\Http\Controllers\Frontend;

use Input;
use Auth;
use App\Models\User;
use App\Models\HitchDetailed as Detailed;
use App\Models\Hitch_Type as Type;
use App\Models\Hitch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $has = User::where('email',Auth::user()->email)->first();
        if ($has->has_floor != 1) {
            return redirect()->route('binding');
        }
        $data = Type::all()->toArray();
        $detailed = Detailed::where('id',1)->get();
        $managers = User::where('is_admin',1)->get();
        return view('home.reported.index', compact('data','detailed','managers'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        if ($this->upload( $request)){
            $path = $this->upload($request);
        } else {
            $path = '';
        }

        //写入数据库
        $bool = Hitch::create([
            'user'  => Auth::user()->email,
            'type'  => $data['type'],
            'type2' => $data['type2'],
            'description' => $data['content'],
            'person' => $data['person'],
            'status' => 1,
            'room'  => Auth::user()->floor,
            'time'  => date('Y-m-d H:i:s', time()),
            'img'   => $path
        ]);

        if ($bool) {
            return "<script>alert('提交成功'); window.location.href='/home'</script>";
        } else {
            return "<script>alert('提交失败');window.history.back(-1);</script>";
        }
    }

    public function cancel(Request $request)
    {
        $bool = Hitch::where('id', $request->get('id'))->update([
//            'person' => '用户自行撤销',
            'finish' => 1,
            'user_cancel' =>1
        ]);
        return $bool;
    }
//获取更加详细的故障类型
    public function getDetailed(Request $request)
    {
        $id = $request->get('id');
        $data = Detailed::where('uid',$id)->get();
        $user = User::where('is_admin',1)->get()->toArray();
        $n = count($user);
        switch ($id){
            case '1':
            case '2':
                $user = $this->sortArr($user, 0);
                break;
            case '3':
            case '4':
                $user = $this->sortArr($user, 1);
                break;
            case '5':
            case '6':
                $user = $this->sortArr($user, 2);
                break;
        }
        return compact('data','user');
    }

    public function sortArr(array $data, $i)
    {
        $array = array();
        array_push($array, $data[$i]);
        unset($data[$i]);
        foreach ($data as $data) {
            array_push($array, $data);
        }
        return $array;
    }

    /*
     * 判断上传文件是否有问题。
    * */
    public function upload(Request $request)
    {
        $file = $request->file('image');

        if (is_null($file)) {
            return false;
        }

        if ($file->isValid()) {
            $extension = ['jpg','png','jpeg','gif'.'bmp'];
            if (!in_array($file->getClientOriginalExtension(), $extension)) {
                return "<script>alert('文件类型错误请重新确认是否为图片类型');window.history.back(-1);</script>";
            }
            if ($file->getSize() >= 500000) {
                return "<script>alert('文件大小超过5m。');window.history.back(-1);</script>";
            }
            $path = $file->store(date('Y-m-d', time()));
            return $path;
        }
    }
//绑定视图
    public function binding()
    {
        return view('home.binding.index');
    }
//绑定用户的楼层信息
    public function setFloor(Request $request)
    {
        $floor = $request->all();
        $fl     = $floor['floor'].$floor['room'];
        $bool = User::where('email', Auth::user()->email)->update([
            'floor' => $fl,
            'has_floor' => 1
        ]);
        if ($bool) {
            return "<script>alert('绑定成功'); window.location.href='/home'</script>";
        } else {
            return "<script>alert('绑定失败');window.history.back(-1);</script>";
        }
    }

}
