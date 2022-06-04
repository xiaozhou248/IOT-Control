<?php
/*
获取云端数据并解析数据(解析json)的模块
*/
//设置编码，否则乱码
header("Content-type: text/html; charset=utf-8");
//设置API类型为 域名/getData.php?topic= 后面的值
$Topic= $_GET['topic'];
//设置Key
$key = "[Key不显示]";
//设置获取数据的API
$GetDataAPI="https://api.bemfa.com/api/device/v1/data/3/get/?uid=".$key."&topic=".$Topic ;
//设置json的变量为访问API返回的内容
$json = file_get_contents($GetDataAPI); 
//解析json的变量的数据 并赋值变量
$decoded_array = json_decode($json, true);

if ($Topic =="AIR")
{
    //如果API类型为AIR
    //输出数据
    echo $decoded_array['data'][0]['msg'];
}
elseif ($Topic == "TEMP")
{
    //如果API类型为TEMP
    //输出数据并加上"温度"
    echo $decoded_array['data'][0]['msg']."℃";
}

//刷新频率(毫秒)
$flushTime = 16000;
//使用js定时刷新页面
echo ("<script>setTimeout('window.location.reload()', $flushTime);</script>");



?>