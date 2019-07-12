<?php
/**
 * Created by PhpStorm.
 * User: liqin
 * Date: 2017/4/01
 * Time: 下午2:36
 */
set_time_limit(0);
function vError($socket)
{
    echo '原因:'.socket_strerror($socket)."\n";
    exit;
}

$oSocket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if($oSocket === false){
    vError($oSocket);
}

$sHost = '114.215.69.86';
$iPort = 21003;
$bRet = socket_connect($oSocket, $sHost, $iPort);
if($bRet === false){
    vError($oSocket);
}


fwrite(STDOUT, 'input:');
$sInput = fgets(STDOUT);

$bRet = socket_write($oSocket, $sInput, strlen($sInput));
if($bRet === false){
    vError($oSocket);
}

while ($sOut = socket_read($oSocket, 8192)) {
    echo $sOut;
}

socket_close($oSocket);




