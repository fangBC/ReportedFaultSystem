<script>
    $(function(){
        $("select[name='type']").change(function(){
            var type = $(this).val();
            $.ajax({
                url:'{{ route('type/ajax') }}',
                type: 'get',
                data: 'id='+type,
                dataType: 'json',
                success: function(data){
                    console.log(data.user)
                    $("select[name='type2']").remove();
                    $("div[name='sec']").append("<select class='form-control'  name='type2'style='background:url({{ asset('assets/images/drop-down.gif') }}) no-repeat right center; background-size:5%;"+"'></select>");
                    $.each(data.data, function (i) {
                        $("select[name='type2']").append("<option value=" + data.data[i].id + ">" + data.data[i].type + "</option>");
                    });
                    $("select[name='person']").remove();
                    $("div[name='ssss']").append("<select class='form-control'  name='person'style='background:url({{ asset('assets/images/drop-down.gif') }}) no-repeat right center; background-size:5%;"+"'></select>");
                    $.each(data.user, function (i) {
                        $("select[name='person']").append("<option value=" + data.user[i].email + ">" + data.user[i].email + "</option>");
                    });
                },
                error: function () {
                    console.log(2)
                }
            })
        })

    })
</script>

<div class="container-fluid">
    <div class="col-md-6" >
        <div class="input-group ">
            <span class="input-group-addon">故障类型：</span>
            <select class="form-control" name="type" style="
                background:url({{ asset('assets/images/drop-down.gif') }}) no-repeat right center;
                background-size:5%;">
                @foreach( $data as $data)
                <option value="{{$data['id']}}">{{ $data['type'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group "name="sec">
            <span class="input-group-addon" >故障***：</span>
            <select class="form-control" name="type2" style="
                    background:url({{ asset('assets/images/drop-down.gif') }}) no-repeat right center;
                    background-size:5%;">
                @foreach( $detailed as $row)
                    <option value="{{$row['uid']}}">{{ $row['type'] }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="input-group " name="ssss">
            <span class="input-group-addon" >处理人员：</span>
            <select class="form-control" name="person" style="
                    background:url({{ asset('assets/images/drop-down.gif') }}) no-repeat right center;
                    background-size:5%;">
                @foreach( $managers as $r)
                    <option value="{{$r['email']}}">{{ $r['email'] }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="input-group ">
            <span class="input-group-addon" >故障描述：</span>
            <textarea class="form-control" name="content" id="" cols="30" rows="5" placeholder="故障详细描述"></textarea>
        </div>

        <div class="input-group ">
        <span class="input-group-addon">图片上传：</span>
            <input type="file" id="file" name="image">
            <span class="file-custom" id="upload-avatar" name="wss"></span>
            </label>
        </div>
        </br>
        <div class="form-group">
            <label class="col-sm-4 control-label"></label>
            <button  type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> 提交</button>
        </div>
    </div>
</div>