<div style="background-color: #fff" class="container-fluid">
    <h2>知识库的添加</h2>
    <hr style="height:1px;border:none;border-top:1px solid #d0d0d0;" />
    <br>
    <form action="{{ url('admin/repository/post')}}" method="post">
        {{ csrf_field() }}

    <div class="container-fluid">
        <div class="col-md-6" >
            <div class="input-group ">
                <span class="input-group-addon">故障类型：</span>
                <select class="form-control" name="type" style="
                    background:url({{ asset('assets/images/drop-down.gif') }}) no-repeat right center;
                    background-size:5%;">
                    @foreach ($data as $data)
                    <option value="{{ $data['id'] }}">{{ $data['type'] }}</option>
                        @endforeach
                </select>
            </div>
            <br>
            <div class="input-group ">
                <span class="input-group-addon">故障标题：</span>
                <input type="text" placeholder=" 故障标题" class="form-control" name="title">
            </div>
            <br>
            <div class="input-group ">
                <span class="input-group-addon" >解决方法：</span>
                <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="解决方法详细描述"></textarea>
            </div>
            </br>
            <div class="form-group">
                <label class="col-sm-4 control-label"></label>
                <button  type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> 添加</button>
            </div>
        </div>
    </div>
    </form>
</div>