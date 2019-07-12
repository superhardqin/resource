<?php
include 'HttpSend.php';
$sender = new HttpSend();
$phone="";//手机号
$sender->sendChecksum($phone,"1234");
echo $sender->getChannelStatus();
?>
