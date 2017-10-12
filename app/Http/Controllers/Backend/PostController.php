<?php

namespace App\Http\Controllers\Backend;

use Session;
use Auth;
use App\Models\Hitch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    /**
     * 接收受理，更新表字段status ，person
     * */

    public function update(Request $request)
    {
        $update = Hitch::where('id', $request->get('id'))
                       ->update([ 'person' => Auth::user()->email, 'status' => '1']);
        return $update;
    }

    /**
     *  撤销故障，并且****
     * **/
    public function cancel()
    {

    }
}
