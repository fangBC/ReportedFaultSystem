<?php

namespace App\Http\Controllers\Backend;

use App\Models\hitch;
use App\Models\Hitch_Type as Type;
use App\Models\Cancel;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display the application home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = Hitch::all();
        $hitch_type = Type::all()->toArray();
        foreach ($data as $k => $v) {
            if ($v['is_cancel'] == 1) {
                $d = Cancel::where('uid', $v['id'])->first()->toArray();
                $data[$k]['cancel'] = $d;
            }
            foreach ($hitch_type as $key => $val) {
                if ($v['type'] == $val['id']) {
                    $data[$k]['type'] = $val['type'];
                }
            }
        }
        return view('backend.home.index', compact('data'));
    }

    /**
     * 显示故障的详细内容
     * */
    public function details()
    {
        return view('backend.home.partials.details');
    }

    /*
     * 显示修改楼层信息
     * */
    public function floorView()
    {
        return view('backend.changfloor.index');
    }

}
