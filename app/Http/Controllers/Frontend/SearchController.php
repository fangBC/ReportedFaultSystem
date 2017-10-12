<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hitch_Type;
use App\Models\Knowledge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $array = Hitch_Type::all();
        $data = Knowledge::where('title', 'like', '%'.$request->get('search').'%', 'or', 'content', 'like' , '%'.$request->get('search').'%')->Paginate(10);
//        dd($data);
        foreach ($data as $k => $v) {
            foreach ($array as $kk => $vv) {
                if ($v['type'] == $vv['id']) {
                    $data[$k]['type'] = $vv['type'];
                }
            }
        }
        return view('home.search.index', compact('data'));
    }
}
