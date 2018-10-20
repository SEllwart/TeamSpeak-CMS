
						<h3 class="page-header"><i class="fa fa-server"></i> Statystyki</h3>
						<div class="well bg-middle container-fluid">
							
<?php

$polaczenie = mysqli_connect($host, $user, $password, false);
mysqli_select_db($polaczenie, $database2);

$zapytanie = "SELECT * FROM stats_server";
$rezultat = mysqli_query($polaczenie, $zapytanie);
$row = mysqli_fetch_assoc($rezultat);
$lserverstatus = $row['server_status'];
$wolnesloty = $row['server_free_slots'];
$kanalow = $row['server_channel_amount'];
$ping = $row['server_ping'];
$packetloss = $row['server_packet_loss'];
$usertoday = $row['user_week'];
$platforma = $row['server_platform'];

if ($lserverstatus == 1){
	$serverstatus = "Online";
	$serverstatusimg = "online";
}else{
	$serverstatus = "Offline";
	$serverstatusimg = "offline";
}

echo<<<END
<table class="table table-condensed" style="margin-bottom: -14px;">
<tbody>
<tr><td style="border:none; padding:0;"><i class="fa fa-power-off" aria-hidden="true"></i> Status: </td><td class='text-right' style="border:none; padding:0;"><span class="label label-success" style="padding-bottom:0.5px; padding-top:0.5px;">$serverstatus</span></td></tr>
<tr><td style="border:none; padding:0;">Uzytkowników online: </td><td class='text-right' style="border:none; padding:0;"><span class="label label-success" style="padding-bottom:0.5px; padding-top:0.5px;">$lonline</span></td></tr>
<tr><td style="border:none; padding:0;">Wolne sloty: </td><td class='text-right' style="border:none; padding:0;"><span class="label label-success" style="padding-bottom:0.5px; padding-top:0.5px;">$wolnesloty</span></td></tr>
<tr><td style="border:none; padding:0;">Online dzisiaj: </td><td class='text-right' style="border:none; padding:0;"><span class="label label-success" style="padding-bottom:0.5px; padding-top:0.5px;">$usertoday</span></td></tr>
<tr><td style="border:none; padding:0;">Kanaly: </td><td class='text-right' style="border:none; padding:0;"><span class="label label-success" style="padding-bottom:0.5px; padding-top:0.5px;">$kanalow</span></td></tr>
<tr><td style="border:none; padding:0;">Ping: </td><td class='text-right' style="border:none; padding:0;"><span class="label label-success" style="padding-bottom:0.5px; padding-top:0.5px;">$ping ms</span></td></tr>
<tr><td style="border:none; padding:0;">Packet Loss: </td><td class='text-right' style="border:none; padding:0;"><span class="label label-success" style="padding-bottom:0.5px; padding-top:0.5px;">$packetloss %</span></td></tr>
<tr><td style="border:none; padding:0;">Platforma: </td><td class='text-right' style="border:none; padding:0;"><span class="label label-success" style="padding-bottom:0.5px; padding-top:0.5px;">$platforma</span></td></tr>
<tr><td style="border:none; padding:0; padding-bottom:1rem;""></td><td style="border:none; padding:0;"></td></tr>
</tbody>
</table>
END;
?>
							
						</div>
						
						<h3 class="page-header"><i class="fa fa-plus-square"></i> Ostatnio <strong>dolaczyl</strong></h3>
						<div class="well bg-middle">
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password, false);
mysqli_select_db($polaczenie, $database);

$zapytanie = "SELECT * FROM clients ORDER BY client_id DESC LIMIT 1";
$rezultat = mysqli_query($polaczenie, $zapytanie);
$row = mysqli_fetch_assoc($rezultat);
$lastuser = $row['client_nickname'];
$ile = mysqli_num_rows($rezultat);
$lastuserid = $row['client_id'];

mysqli_select_db($polaczenie, $database2);
$zapytanieonline = "SELECT * FROM user WHERE cldbid=$lastuserid";
$rezultatonline = mysqli_query($polaczenie, $zapytanieonline);
$rowonline = mysqli_fetch_assoc($rezultatonline);
$online = $rowonline['online'];

if ($online == 1){
	$lastuserstatus = "Online";
}else{
	$lastuserstatus = "Offline";
}

if ($online == 1) {
	$lastuserstatusimg = "online";
}else{
	$lastuserstatusimg = "offline";
}

echo<<<END
<h3><a href='/panel/?id=$lastuserid' style='text-decoration : none; color : #ffffff;' ><img src='/inc/ikony/status/$lastuserstatusimg.png' data-toggle='tooltip-arrow' data-placement='top' title='$status'/><strong data-toggle="tooltip-arrow" data-placement="top" title="$lastuserid">$lastuser</strong></a></h3>
<blockquote style="border-color:#EEEEEE !important;">
<footer>Aktualnie $lastuserstatus</footer>
</blockquote>
END;


?>
						</div>
						<h3 class="page-header"><i class="fa fa-facebook"></i> FanPage</h3>
						
							<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FiPerionpl%2F&tabs=timeline&width=290&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" scrolling="no" frameborder="0" style="background-color: #fff; border: none; overflow: hidden; min-height: 530px; width: 100%;" allowtransparency="true"></iframe>
							