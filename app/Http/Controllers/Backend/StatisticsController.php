<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    private $name = array();      //所有名字
    private $time = array();      //时间
    private $count = array();     //数量

   public function index()
    {
        $this->name = User::where('is_admin', '>=', '1')->select('id', 'email', 'is_admin')->get();
        if (Auth::user()->is_admin != 2) {
            $data = DB::select("SELECT DATE_FORMAT(finish_time,'%Y-%m-%d') as time , count(*) as count FROM hitch WHERE person = '".Auth::user()->email."' GROUP BY  finish_time");
        } else {
            $data = DB::select("SELECT DATE_FORMAT(finish_time,'%Y-%m-%d') as time , count(*) as count FROM hitch GROUP BY  finish_time");
        }
        foreach ($data as $k => $v) {
            array_push($this->time,$v->time);
            array_push($this->count,$v->count);
        }
        $time = json_encode($this->time);
        $count = json_encode($this->count);
        $name = $this->name;
        return view('backend.statistics.statistics',['time' => $time, 'count' => $count, 'name' => $name]);
   }

    public function selectName(Request $request)
    {
        $person = $request->get('person');
        if ($person == '0') {
            $data = DB::select("SELECT DATE_FORMAT(finish_time,'%Y-%m-%d') as time , count(*) as count FROM hitch GROUP BY  finish_time");
        } else {
            $data = DB::select("SELECT DATE_FORMAT(finish_time,'%Y-%m-%d') as time , count(*) as count FROM hitch WHERE person = '".$person."' GROUP BY  finish_time");
        }
        foreach ($data as $k => $v) {
            array_push($this->time, $v->time);
            array_push($this->count, $v->count);
        }
        $array = [
            'time' => $this->time,
            'count' => $this->count
        ];
        return $array;
    }
}
