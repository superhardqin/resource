<?php
/**
 * Created by PhpStorm.
 * User: liqin
 * Date: 2017/4/01
 * Time: 下午2:07
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
$bRet = socket_bind($oSocket, $sHost, $iPort);
if($bRet === false){
    vError($oSocket);
}

$bRet = socket_listen($oSocket, 4);
if($bRet === false){
    vError($oSocket);
}

while(true)
{
    echo "waiting from connection...\n";
    $oMsgSocket = socket_accept($oSocket);

    $sCurHost = '';
    $sCurPort = 0;
    socket_getpeername($oMsgSocket, $sCurHost, $sCurPort);

    echo "... connected from :".$sCurHost."\n";

    if($oMsgSocket === false){
        vError($oMsgSocket);
    }

    $sBuf = socket_read($oMsgSocket, 9000);

    $sReply = date("Y-m-d H:i:s")." ".$sBuf;
    socket_write($oMsgSocket, $sReply, strlen($sReply));

    socket_close($oMsgSocket);
}
socket_close($oSocket);
