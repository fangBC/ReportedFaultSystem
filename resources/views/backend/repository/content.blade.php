<script>
    function getVal(value)
    {
        console.log(value);
        $.ajax({
            url: "{{ url('admin/repository/ajax') }}?type="+value,
            type: "get",
            data: "type="+value,
            success: function (msg) {
                console.log(msg)
                $("#ajax_tr"+value).html(msg);
            },
            error: function () {

            }
        });
    }

    function deleted(id, obj)
    {
        $.ajax({
            url: "{{ url('admin/repository/ajax/deleted') }}?id="+id,
            type: "get",
            data: "",
            success: function (msg) {
//                $("#ajax_tr").html(msg);
                obj.remove();
            },
            error: function () {
                alert("删除失败");
            }
        });
    }

</script>

<div class="panel-group" id="accordion">
        <div class="panel-heading">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">故障类型
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" id="dropul">
                    <?php $hitch_cp = $hitch; ?>
                    @foreach ($hitch as $hitch)
                    <li>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $hitch['id'] }}" onclick="getVal($(this).html())">{{ $hitch['type'] }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    @foreach ($hitch_cp as $hitch)
        <div class="panel panel-default">
            <div id="collapse{{ $hitch['id'] }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div id="ajax_tr{{ $hitch['type'] }}"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>