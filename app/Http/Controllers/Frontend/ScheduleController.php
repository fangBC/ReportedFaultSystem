<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use App\Models\Hitch;
use App\Models\Hitch_Type as Type;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user()->email;
        $data = Hitch::where('user', $user)->orderBy('id','desc')->get()->toArray();
        $hitch_type = Type::all()->toArray();
        foreach ($data as $k => $v) {
            foreach ($hitch_type as $key => $val) {
                if ($v['type'] == $val['id']){
                    $data[$k]['type'] = $val['type'];
                }
            }
        }
        return view('home.schedule.index',compact('data'));
    }
}
