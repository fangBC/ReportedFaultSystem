<div style="background-color: #fff" class="container-fluid">
<h2>维护人员</h2>
    <select id="person" class="form-control" style="
            width:100px;
            padding:3px 10px;
            appearance:none;
            -moz-appearance:none;
            -webkit-appearance:none;
            background:url({{ asset('assets/images/drop-down.jpg') }}) no-repeat right center;
            background-color: #eee;
            background-size:20%;" >
        @if (Auth::user()->is_admin == 2)
        <option value="0">全部人员</option>
        @foreach ($name as $name)
            <option value="{{ trim($name->email) }}">{{ trim($name->email) }}</option>
        @endforeach
        @else
            <option value="{{ trim(Auth::user()->email) }}">{{ trim(Auth::user()->email) }}</option>
        @endif
    </select>
<div id="tubiao" style="width: 650px; height: 450px;"></div>
</div>
<script>

    var date = [];
    var count = [];

    $(function(){
        $("#person").change(function(){
            var index = $("#person").val();
            $.ajax({
                url:"{{ url('admin/statistics/select') }}?person="+index,
                data: "",
                type: "get",
                success: function (msg) {
                    myChart.setOption({
                        xAxis: {
                            data: msg.time
                        },
                        series: [{
                            name:'修复量',
                            data: msg.count
                        }]
                    });
                },
                error: function () {

                }
            });
        })
    })

    <?php
            $time = json_decode($time);

            foreach ($time as $k => $v){?>
            date.push("<?php  echo $v;?>");
            <?php
            }
    ?>

               <?php
            $count = json_decode($count);

            foreach ($count as $k => $v){?>
            count.push("<?php  echo $v;?>");
            <?php
            }
            ?>
    var myChart = echarts.init(document.getElementById('tubiao'));
    var now = new Date();
    var oneDay = 24 * 3600 * 1000;
    var data = [];

    function addData(shift) {
        now = [now.getFullYear(), now.getMonth() + 1, now.getDate()].join('/');
        date.push(now);

        if (shift) {
            date.shift();
            data.shift();
        }
        now = new Date(+new Date(now) + oneDay);
    }

    for (var i = 1; i < 100; i++) {
        addData();
    }

    var option = {
        title: {
            text: ''
        },
        tooltip: {},
        toolbox: {
            show: true,
            feature: {
                dataZoom: {
                    yAxisIndex: 'none'
                },
                dataView: {readOnly: false},
                magicType: {type: ['line', 'bar']},
                restore: {},
                saveAsImage: {}
            }
        },
        legend: {
            data:['修复量']
        },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: date
        },
        yAxis: {},
        series: [{
            name: '修复量',
            type: 'line',
            data: count
        }]
    };

    setInterval(function () {
        addData(true);
        myChart.setOption({
            xAxis: {
                data: date
            },
            series: [{
                name:'修复量',
                data: data
            }]
        });
    }, 86400000);
    myChart.setOption(option);
</script>