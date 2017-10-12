<div style="background-color: #fff" class="container-fluid">
    <div class=".col-md-3 .col-md-offset-3">
        <form method="post" action="{{ route('admin/register') }}">
            {{ csrf_field() }}
            <p></p>
            <p></p>
            <div class="form-group">
                <label for="exampleInputEmail1">工号</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入工号" name="email">

           </div>
            <div class="form-group">
               <label for="exampleInputPassword1">密码</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码" name="pwd">

            </div>
           <div class="form-group">
                <label for="exampleInputPassword1">账号类型</label>
                <select class="form-control" name="type">
                    <option type="1" value="0">普通账号</option>
                    <option type="2" value="1">网络管理员</option>
                    <option type="3" value="2">超级管理员</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">提交</button>

            <p></p>
        </form>
    </div>
</div>