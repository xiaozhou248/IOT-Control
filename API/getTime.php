<?php
//设置时区,某些PHP环境没有配置时区
date_default_timezone_set('Asia/Shanghai');
//输出时间
//格式为 年-月-日_小时:分钟:秒
echo date("Y-m-d_H:i:s");

//刷新频率(毫秒)
$flushTime = 16000;
//使用js定时刷新页面
echo ("<script>setTimeout('window.location.reload()', $flushTime);</script>");
?>