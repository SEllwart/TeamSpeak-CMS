<?php
require $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';
require $_SERVER['DOCUMENT_ROOT'] . '/inc/bot/lib/ts3admin.class.php';

$tsAdmin = new ts3admin($config['ts']['ip'], $config['ts']['querry']);
$tsAdmin->connect();
$tsAdmin->login($config['ts']['user'], $config['ts']['password']);
$tsAdmin->selectServer($config['ts']['port']);

//dołączenie funkcji
include $_SERVER['DOCUMENT_ROOT'] . '/inc/bot/functions/ServerInfo.php';
include $_SERVER['DOCUMENT_ROOT'] . '/inc/bot/functions/ChannelsList.php';
include $_SERVER['DOCUMENT_ROOT'] . '/inc/bot/functions/ClientList.php';

//uruchomienie funkcji
ServerInfo($tsAdmin, $config);
ChannelsList($tsAdmin, $config);
ClientList($tsAdmin, $config);
?>