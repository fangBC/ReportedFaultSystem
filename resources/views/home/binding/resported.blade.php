
<div class="card">
    <div class="card-header">
        <h2>请绑定您的楼层信息</h2>
        <hr>
        <br>

        @include('shared.errors')

        @include('shared.success')

        <form class="keyboard-save" role="form" method="POST"  action="{{ route('setFloor') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="container-fluid">
                <div class="col-md-6" >
                    <div class="input-group ">
                        <div class="input-group ">
                            <span class="input-group-addon">楼层信息：</span>
                            <div class="input-group-btn">
                                <select name="floor" class="form-control" style="
                                        width:50px;
                                        padding:3px 10px;
                                        appearance:none;
                                        -moz-appearance:none;
                                        -webkit-appearance:none;
                                        background:url({{ asset('assets/images/drop-down.jpg') }}) no-repeat right center;
                                        background-color: #eee;
                                        background-size:20%;" >
                                    <option value="1">一楼</option>
                                    <option value="2">二楼</option>
                                    <option value="3">三楼</option>
                                    <option value="4">四楼</option>
                                </select>
                            </div>
                            <input type="text" placeholder=" 房间号" class="form-control" name="room">
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <label class="col-sm-4 control-label"></label>
                        <button  type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> 提交</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>