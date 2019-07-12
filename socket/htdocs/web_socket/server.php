<?php
/**
 * Created by PhpStorm.
 * User: liqin
 * Date: 2017/7/23
 * Time: 下午9:49
 */

require_once '/home/www/lib/WebSocket/vendor/autoload.php';

$sIp = '172.18.143.177';
$sPort = 8890;
$oWebsocket = new Hoa\Websocket\Server(
    new Hoa\Socket\Server('ws://'.$sIp.':'.$sPort)
);


$oWebsocket->on('open', function (Hoa\Event\Bucket $bucket) {
    echo 'new connection', "\n";

    return;
});


$oWebsocket->on('message', function (Hoa\Event\Bucket $bucket) {
    $data = $bucket->getData();
    echo '> message ', $data['message'], "\n";
    $bucket->getSource()->send($data['message']);
    return;
});


$oWebsocket->on('close', function (Hoa\Event\Bucket $bucket) {
    echo 'connection closed', "\n";

    return;
});

$oWebsocket->run();