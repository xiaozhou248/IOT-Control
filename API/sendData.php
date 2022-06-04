<?php
//设置编码，否则乱码
header("Content-type: text/html; charset=utf-8");
//设置时区,某些PHP环境没有配置时区
date_default_timezone_set('Asia/Shanghai');
//设置消息变量为域名/getData.php?msg=后面的值
$Msg= $_GET['msg'];
//设置Key
$key = "[Key不显示]";
//设置发送数据的API Control:控制台
$GetDataAPI="https://api.bemfa.com/api/device/v1/data/3/push/get/?uid=".$key."&topic=Control&msg=".$Msg;
//设置json的变量为访问API返回的内容
$json = file_get_contents($GetDataAPI); 
//解析json的变量的数据 并赋值变量
$decoded_array = json_decode($json, true);
//设置发送状态为一个变量
$status =  $decoded_array['status'];

if ($status == "sendok")
{
    echo "发送成功！<br>";
    echo "时间:".date("Y-m-d_H:i:s")."<br>";
    echo "命令:".$Msg."<br>";
}
else
{
    echo "发送失败!请重试<br>";
    echo "时间:".date("Y-m-d_H:i:s")."<br>";
    echo "主题:".$Topic."<br>";
    echo "命令:".$Msg."<br>";
}
?>