<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<script>
    $(function(){


        $("#update").click(function(){
//            var pwd = $("#pwd").val();
            var new_pwd = $("#new_pwd").val();
            var nn_pwd = $("#n_pwd").val();
            $.ajax({
                url: "{{ route('auth/password') }}"+"?new_password="+new_pwd+"&n_password="+nn_pwd,
                data: "",
                type: "get",
                beforeSend: function () {
                  if (new_pwd != nn_pwd) {
                      alert('两次密码不一样');
                      return false;
                  }
                },
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
            <li><a href="" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="zmdi zmdi-account"></i>修改密码</a></li>
            <li><a href="{{ url('auth/logout') }}" name="logout"><i class="zmdi zmdi-power"></i>退出</a></li>
        </ul>
    </div>
    <ul class="main-menu main-ul">
        <li>
            <form action="{{ url('home/search') }}" method="get">
                <div class="input-group" style="margin-left:18px;
                                            margin-right:25px;
                                            border-width:1px;
                                            border-style:solid;
                                            border-color:#adadad;">
                    <input type="text" class="form-control" placeholder="故障知识库查询" style="margin-left:7px; border-style:none;" name="search">
                    <span class="input-group-btn">
                        <a href="">
                            <button class="btn btn-default" type="submit" style="margin-right:3px;">查询</button>
                        </a>
                    </span>
                </div>
            </form>
        </li>
        <li>
            @if(Auth::user()->has_floor != 1)<a href="{{ route('binding') }}"><i class="zmdi zmdi-home"></i>绑定楼层</a> @else @endif
        </li>
        <li>
            <a href="{{ url('home') }}"><i class="zmdi zmdi-home"></i>故障保修</a>
        </li>
        <li @if (Request::is('admin/accepted')) class="active" @endif>
            <a href="{{ url('home/schedule') }}"><i class="zmdi zmdi-labels"></i> 进度查询</a>
        </li>

    </ul>
</aside>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
                    <button type="button" class="btn btn-primary" id="update">提交</button>
                </div>
            </div>
        </div>
    </div>
</div>
