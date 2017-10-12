<?php

class ems {

    private $message = '';

    public function gg()
    {
        //第一步：正则筛选出用户发来的数据，判断是否符合格式要求： 通知书+考生号 例如：通知书0604910482
//        $matchs = array();
//        $ret = preg_match('/^考号\s?(\d{10}|\d{14})$/', $this->message['content'], $matchs);//10或14位考号
//        if(!$ret) {
//            return $this->respText('请按此格式发送: 考号0123456789');
//        }
//        $examid=$matchs[1]; //匹配出考生号

//第二步：用考号去本地数据库里查询对应的ems快递单号

//        $conn = mysql_connect("localhost",'root','root');
//        mysql_select_db('ems',$conn);

        $code = "9769813460122";

//        $sql = "select code from emscode where examid='".$examid."'";


//        $result = mysql_query($sql,$conn);
//        $code = mysql_fetch_array($result);

//第三步：用ems快递单号上网查询物流信息并返回给用户

        $url = "http://www.kuaidi100.com/query?type=ems&postid=".$code;


        $dat = $this->ihttp_get($url);
        if(!empty($dat) && !empty($dat['content'])) {
            $traces = json_decode($dat['content'], true);
            if(is_array($traces)) {
                $traces = $traces['data'];
                if(is_array($traces)) {
                    $traces = array_reverse($traces);
                    $reply = '';
                    foreach($traces as $trace) {
                        $reply .= "{$trace['time']} - {$trace['context']}\n";
                    }
                    if(!empty($reply)) {
                        $reply = "已经为你查到相关快递记录: \n" . $reply;
                        return $this->respText($reply);
                    }
                }
            }
        }
//        return $this->respText('你好，暂时没能查到相关快递信息，请稍后再试，或移步学校官网查询快递单号 http://211.66.88.6/gkems/');

    }

    public function respText($content)
    {

    }

    public function ihttp_get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
$ems = new ems();
$ems->gg();