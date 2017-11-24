<?php
require dirname(__FILE__) . '/StatisticClient.php';
// 统计开始
StatisticClient::tick("User", 'getInfo');
// 统计的产生，接口调用是否成功、错误码、错误日志
$success = true;
$code = 0;
$msg = '';
// 假如有个User::getInfo方法要监控
//$user_info = User::getInfo();
$user_info = false;
if (!$user_info) {
    // 标记失败
    $success = true;
    // 获取错误码，假如getErrCode()获得
    //$code = User::getErrCode();
    $code = 200;
    // 获取错误日志，假如getErrMsg()获得
    //$msg = User::getErrMsg();
    $msg = '测试';
}
// 上报结果
StatisticClient::report('User', 'getInfo', $success, $code, $msg);
