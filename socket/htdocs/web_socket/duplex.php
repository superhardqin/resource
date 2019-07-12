<?php
/**
 * Created by PhpStorm.
 * User: liqin
 * Date: 2017/7/24
 * Time: 下午2:57
 */
require_once '/home/www/lib/WebSocket/vendor/autoload.php';

$sIp = '172.18.143.177';
$sPort = 8895;
$oWebsocket = new Hoa\Websocket\Server(
    new Hoa\Socket\Server('ws://'.$sIp.':'.$sPort)
);


$oWebsocket->on('open', function (Hoa\Event\Bucket $bucket) {
    echo 'new connection', "\n";

    return;
});


$oWebsocket->on('message', function (Hoa\Event\Bucket $bucket) {
    $oRedis = new Redis();
    $oRedis->connect('127.0.0.1', 6379);
    echo "waiting...\n";

    while(true){
        $aMsg = $oRedis->blPop(array('message'), 0);
        echo "get message...\n";
        if($aMsg){
            $bucket->getSource()->send($aMsg[1]);
        }
        else{
            $bucket->getSource()->send('empty');
        }
    }

    return;
});


$oWebsocket->on('close', function (Hoa\Event\Bucket $bucket) {
    echo 'connection closed', "\n";

    return;
});

$oWebsocket->run();