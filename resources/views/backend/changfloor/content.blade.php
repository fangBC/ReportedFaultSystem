<div style="background-color: #fff" class="container-fluid">
    <div class=".col-md-3 .col-md-offset-3">
        <form method="post" action="{{ route('admin/register') }}">
            {{ csrf_field() }}
            <p></p>
            <p></p>
            <div class="form-group">
                <label for="exampleInputEmail1">工号：</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入工号" name="email">
           </div>
            <div class="form-group">
               <label for="exampleInputPassword1">楼层信息：</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码" name="pwd">

            </div>
            <button type="submit" class="btn btn-primary">提交</button>

        </form>
    </div>
</div>