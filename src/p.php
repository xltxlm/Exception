<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/11/9
 * Time: 上午11:28
 */

/**
 * 打印错误信息
 * @param $var
 * @param bool $trace
 */
function p($var, $trace = false)
{
    static $uniqid;
    if (!$uniqid) {
        $uniqid = uniqid();
    }
    $debug_backtrace_old = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
    $debug_backtrace = $debug_backtrace_old[0];
    error_log('=>[begin]' . microtime(true));
    error_log(var_export($var, true));
    if ($trace) {
        error_log((new \Exception())->getTraceAsString());
    }
    error_log("<===[$uniqid]=={$debug_backtrace['file']}:{$debug_backtrace['line']}===[end]");
    $_SERVER['REQUEST_URI'] = preg_replace('/([_0-9a-z]+)=&/iUs', '', $_SERVER['REQUEST_URI']);
    error_log("<==={$_SERVER['REQUEST_URI']}===[end]");
}