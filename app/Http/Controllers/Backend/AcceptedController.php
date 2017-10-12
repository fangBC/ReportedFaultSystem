<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\Hitch;
use App\Models\Hitch_Type as Type;
use App\Models\Cancel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AcceptedController extends Controller
{
    
    /**
     * 显示已受理界面
     * 
     * **/
    public function index()
    {
        if (Auth::user()->is_admin == 2){
            $data = Hitch::all()->toArray();
        } else {
            $data = Hitch::where('person', Auth::user()->email)->orderBy('created_at', 'desc')->get();
        }
        $hitch_type = Type::all()->toArray();
        foreach ($data as $k => $v) {
            foreach ($hitch_type as $key => $val) {
                if ($v['is_cancel'] == 1) {
                    $d = Cancel::where('uid', $v['id'])->first()->toArray();
                    $data[$k]['cancel'] = $d;
                }
                if ($v['type'] == $val['id']){
                    $data[$k]['type'] = $val['type'];
                }
            }
        }
        return view('backend.accepted.accepted', compact('data'));
    }
    
    /**
     * 撤销故障单
     * 
     * */
    public function cancel(Request $request)
    {

        if (Cancel::checkItem($request->get('id'))) {
            Cancel::where('uid', $request->get('id'))
                  ->update(['type' => $request->get('content'), 'content' => $request->get('text')]);
        } else {
            $cancel = Cancel::create([
                'uid'  => $request->get('id'),
                'type' => $request->get('content'),
                'content' => $request->get('text')
            ]);
        }
        $boole = Hitch::where('id', $request->get('id'))
            ->update([
                'status' => 0,
                'is_cancel'     => 1
            ]);
    }

    /*
     * 完成故障的ajax接口
     * */
    public function finish(Request $request)
    {
        $id = $request->get('id');
        $bool = Hitch::where('id', $id)
                     ->update([
                         'finish'=> 1,
                         'status' => 2,
                         'finish_time' => date('Y-m-d', time())
                     ]);
        return $bool;
    }

    /*
     *反馈接口
     * */
    public function feedBack(Request $request)
    {
        $id = $request->get('id');
        $feed = $request->get('feed');
        $bool = Hitch::where('id', $id)
            ->update([
                'feedback' => $feed
            ]);
        return $bool;
    }

}
