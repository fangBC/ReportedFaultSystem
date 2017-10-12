<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Validator;
use \App\Models\Hitch_Type;
use App\Models\Knowledge;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation;
use App\Http\Controllers\Controller;

class RepositoryController extends Controller
{
    /**
     * 创建知识库
     * */
    public function store(Request $request)
    {
        $title = $request->get('title');
        $content = $request->get('content');

        $bool = Validator::make($request->all(),[
           'type' => 'Required',
            'title' => 'Required',
            'content' => 'Required'
        ]);

        if ( $bool->fails()) {
            return "<script>alert('请填写完整信息');window.history.back(-1);</script>";
        }

        Knowledge::create([
            'founder' => Auth::User()->email,
            'type' => $request->get('type'),
            'title' => $title,
            'content' => $content
        ]);
        return "<script>alert('提交成功');window.location.href='add'</script>";
    }

    /**
     * 修改知识库
     * **/
    public function update(Request $request)
    {

    }

    /**
     * 删除知识库
     * **/
    public function deleted(Request $request)
    {
        $bool = Knowledge::destroy($request->get('id'));
        return $bool;
    }
    
    public function show()
    {
        $hitch = Hitch_Type::all();
        return View('backend.repository.repository', compact('hitch'));
    }
    
    public function ajax(Request $request)
    {
        $array = Hitch_Type::all()->toArray();     //故障类型
        //查找故障的id
        $id = Hitch_Type::where('type', $request->get('type'))->first()->toArray()['id'];
        $data = Knowledge::where('type', $id)->get()->toArray();
        $table = "<table class='table table-hover' ><thead><tr><th>故障类型</th><th class='col-md-3'>故障问题</th><th>解决方法</th><th class='col-md-2'>创建时间</th><th>创建人</th><th>操作</th></tr></thead><tbody>";
        $table2 = "</tbody></table>";
        $tt  = "";
        foreach ($data as $k => $v) {
            foreach ($array as $kk => $vv){
                if ($vv['id'] == $v['type']) {
                    $v['type'] = $vv['type'];
                }
            }
            $ta ="<div class='modal fade' id='exampleModal{$v['id']}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'><div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h4 class='modal-title' id='exampleModalLabel'>故障问题解决方法</h4></div><div class='modal-body'><div class='form-group'><label for='recipient-name' class='control-label'>故障问题</label><h3>{$v['title']}</h3></div><div class='form-group'><label for='message-text' class='ontrol-label'>解决方法:</label><h3>{$v['content']} </h3></div></div><div class='modal-footer'><button type='button' class='btn btn-default' data-dismiss='modal'>关闭</button></div></div></div></div>";
            $tr ="<tr><td>{$v['type']}</td><td><a href='#' data-toggle='modal' data-target='#exampleModal{$v['id']}' data-whatever='@mdo'><p style='overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 20em;'>{$v['title']}</p></a></td><td><p style='overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 20em;'>{$v['content']}</p></td><td>{$v['created_at']}</td><td>{$v['founder']}</td><td><button type='submit' class='btn btn-primary btn-icon-text' onclick='deleted($(this).val(), $(this).parents(`tr`))' value={$v['id']}>删除</button></td>";
            $table .= $tr;
            $tt .=$ta;
        }

        $ar = $table.$table2.$tt;
        return $ar;
    }
}
