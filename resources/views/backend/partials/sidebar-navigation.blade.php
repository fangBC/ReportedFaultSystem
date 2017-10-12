<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<script>
    $(function(){


        $("#rest_pwd").click(function(){
//            var pwd = $("#pwd").val();
            var new_pwd = $("#new_pwd").val();
            var nn_pwd = $("#n_pwd").val();
            $.ajax({
                url: "{{ route('auth/password') }}"+"?new_password="+new_pwd+"&n_password="+nn_pwd,
                data: "",
                type: "get",
//                beforeSend: function () {
//                  if (new_pwd != nn_pwd) {
//                      alert('两次密码不一样');
//                      return false;
//                  }
//                },
                success: function (msg) {
//                    console.log(msg)
                    if (msg == 403){
                        alert('原密码错误')
                    } else if( msg == 200){
                        alert('密码修改成功');
                        location.reload();
                    }else {
                        console.log(msg)
                    }
                },
                error: function (XMLHttpRequest, ajaxOptions, thrownError) {
                    console.log(XMLHttpRequest);
                    alert("提交失败");
                }
            });
        })
    })
</script>




<aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu">
        <a href="">
            <div class="profile-pic" style="width: 268px;height: 77px">

            </div>
            <div class="profile-info">
                {{ Auth::user()->email }}
                <i class="zmdi zmdi-caret-down"></i>
            </div>
        </a>
        <ul class="main-menu profile-ul">
            <li><a href="" data-toggle="modal" data-target="#rest_pwd_div" data-whatever="@mdo"><i class="zmdi zmdi-account"></i>修改密码</a></li>
            <li><a href="{{ url('auth/logout') }}" name="logout"><i class="zmdi zmdi-power"></i>退出</a></li>
        </ul>
    </div>
    <ul class="main-menu main-ul">
        <li @if (Request::is('admin/index')) class="active" @endif><a href="{{ url('admin/index') }}"><i class="zmdi zmdi-home"></i> 故障列表</a></li>

        <li @if (Request::is('admin/accepted')) class="active" @endif><a href="{{ url('admin/accepted') }}"><i class="zmdi zmdi-labels"></i> 待处理故障</a></li>

        <li @if (Request::is('admin/statistics')) class="active" @endif><a href="{{ url('admin/statistics') }}"><i class="zmdi zmdi-collection-folder-image"></i> 故障统计</a></li>
        <li @if (Request::is('admin/change/floor')) class="active" @endif><a href="{{ url('admin/change/floor') }}"><i class="zmdi zmdi-labels"></i> 修改楼层信息</a></li>
    @if (Auth::user()->is_admin == 2 )
        <li @if (Request::is('admin/register')) class="active" @endif><a href="{{ url('admin/register') }}"><i class="zmdi zmdi-settings"></i> 用户注册</a></li>
        @endif

        <li class="sub-menu @if (Request::is('admin/repository*')) active toggled @endif">
            <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-search"></i> 故障知识库</a>
            <ul>
                <li><a href="{{ url('admin/repository') }}" >所有的知识库 <span class="label label-default label-totals"></span></a></li>
                <li><a href="{{ url('admin/repository/add') }}" >添加新的知识</a></li>
            </ul>
        </li>
    </ul>
</aside>

<div class="modal fade" id="rest_pwd_div" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">修改密码</h4>
            </div>
            <div class="modal-body">
                <form>
                    {{--<div class="form-group">--}}
                        {{--<label for="recipient-name" class="control-label">原始密码</label>--}}
                        {{--<input type="password" class="form-control" id="pwd" name="pwd">--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label for="message-text" class="control-label">新密码</label>
                        <input type="password" class="form-control" id="new_pwd" name="new_pwd">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">重复输入新密码</label>
                        <input type="password" class="form-control" id="n_pwd" name="n_pwd">
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" id="rest_pwd">提交</button>
                </div>
            </div>
        </div>
    </div>
</div>
