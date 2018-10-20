<!DOCTYPE html>
<html lang="pl">
  <head>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/head.php';
?>
  </head>
  <a name="nav"/>
  <body class="bg-dark czcionka-1">
  


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';
$baner = $config['strona']['baner'];
$tsip = $config['ts']['ip'];
$tsname = $config['ts']['nazwa'];
echo<<<END
    
    
    <img class="img-responsive" src="$baner" style="box-shadow: 0px 6px 20px 3px rgba(0,0,0,1);background-size:cover;"/>

		
		
		
		<section class="container-fluid font-white padding-0">
			<div class="container padding-20">
				<!-- przerywnik -->
			</div>

			<div class="container text-center">
				<div class="row">
					<div class="col-md-12">
						<div class="panel  panel-default ct-1">
							<h3>Kliknij, aby wejść na serwer <strong>TeamSpeak</strong></h3><br />
							<a href="ts3server://$tsip" target="_blank" class="btn btn-success btn-lg" data-toggle="tooltip" data-placement="top" title="$tsname">Połącz się!</a>
						</div>
					</div>
				</div>
            </div>

			<div class="container padding-20 padding-0">
				<hr />
			</div>
			
			<section class="container">
				
				<div class="row">
					<div class="col-md-9">
						<h3 class="page-header"><i class="fa fa-star-o" aria-hidden="true"></i> Elita Serwera <strong> - Top 10</strong></h3>
						
						
							
										<div class="row">
											<div class="col-md-6">
								
												
												<div class="panel panel-group bg-light">
													<div class="panel  panel-default ">
														<div class="panel-heading bg-black font-white"><h4>Czas na serwerze</h4></div>
														<div class="panel-body bg-middle">
															
															<table class="table table-condensed" style="margin-bottom: -14px;">
																<tbody>
																	<tr><th>Miejsce:</th><th>Nick:</th><th class='text-right'>Godziny:</th></tr>
END;

$starttime = microtime(true);
require_once 'panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password, false);
mysqli_select_db($polaczenie, $database2);
$zapytanieranking = "SELECT cldbid, count, name, online FROM user WHERE except= 0 ORDER BY count DESC LIMIT 10";
$rezultatranking = mysqli_query($polaczenie, $zapytanieranking);
$ileranking = mysqli_num_rows($rezultatranking);


for ($i = 1; $i <= $ileranking; $i++) 
	{
		$rowranking = mysqli_fetch_assoc($rezultatranking);
		$miejsce = $i;
		$id = $rowranking['cldbid'];
		$wyniksec = $rowranking['count'];
		$online = $rowranking['online'];
		$wynik = round($wyniksec / 3600);
	
mysqli_select_db($polaczenie, $database);	

//nick
$zapytanienick = "SELECT * FROM clients WHERE client_id=$id";
$rezultatnick = mysqli_query($polaczenie, $zapytanienick);
$rownick = mysqli_fetch_assoc($rezultatnick);
$nick = $rownick['client_nickname'];

$zapytanierola = "SELECT * FROM group_server_to_client WHERE id1=$id AND (group_id= '8' OR group_id= '11' OR group_id= '12' OR group_id= '14' OR group_id= '15' OR group_id= '10' OR group_id= '28' OR group_id= '29' OR group_id= '30' OR group_id= '31' OR group_id= '64' OR group_id= '65' OR group_id= '66')";
$rezultatrola = mysqli_query($polaczenie, $zapytanierola);
$rowrola = mysqli_fetch_assoc($rezultatrola);
$rola = $rowrola['group_id'];
	
if($online == 1){
$status = "Online";
}else{
$status = "Offline";
}
	
if($online == 1 && ($rola==10 || $rola==28 || $rola==29 || $rola==30 || $rola==31 || $rola==64 || $rola==65)){
$statusimg = "onlineadmin";
}elseif($online == 1){
$statusimg = "online";
}else{
$statusimg = "offline";
}
		
echo<<<END
		
<tr><td>$miejsce.</td><td><img src='inc/ikony/status/$statusimg.png' data-toggle='tooltip-arrow' data-placement='top' title='$status'/><a href='panel/?id=$id' style='text-decoration : none; color : #ffffff;'><strong data-toggle="tooltip-arrow" data-placement="top" title="$id">$nick</strong></a></td><td class='text-right'>$wynik</td></tr>
		
END;

	}

?>
																</tbody>
															</table>
															
														</div>
													</div>
												</div>
									
											</div>
											<div class="col-md-6">
								
										
												<div class="panel panel-group bg-light">
													<div class="panel  panel-default ">
														<div class="panel-heading bg-black font-white"><h4>Liczba połączeń</h4></div>
														<div class="panel-body bg-middle">
															<table class="table table-condensed" style="margin-bottom: -14px;">
																<tbody>
																	<tr><th>Miejsce:</th><th>Nick:</th><th class='text-right'>Połączenia</th></tr>
															
<?php

$starttime = microtime(true);
require_once 'panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password, false);
mysqli_select_db($polaczenie, $database);
$zapytanieranking = "SELECT client_id, client_nickname, client_totalconnections FROM clients ORDER BY client_totalconnections DESC LIMIT 10";
$rezultatranking = mysqli_query($polaczenie, $zapytanieranking);
$ileranking = mysqli_num_rows($rezultatranking);


for ($i = 1; $i <= $ileranking; $i++) 
	{
		$rowranking = mysqli_fetch_assoc($rezultatranking);
		$miejsce = $i;
		$id = $rowranking['client_id'];
		$wynik = $rowranking['client_totalconnections'];
	
mysqli_select_db($polaczenie, $database2);
$zapytanieonline = "SELECT * FROM user WHERE cldbid=$id";
$rezultatonline = mysqli_query($polaczenie, $zapytanieonline);
$rowonline = mysqli_fetch_assoc($rezultatonline);
$online = $rowonline['online'];

mysqli_select_db($polaczenie, $database);
//nick
$zapytanienick = "SELECT * FROM clients WHERE client_id=$id";
$rezultatnick = mysqli_query($polaczenie, $zapytanienick);
$rownick = mysqli_fetch_assoc($rezultatnick);
$nick = $rownick['client_nickname'];

$zapytanierola = "SELECT * FROM group_server_to_client WHERE id1=$id AND (group_id= '8' OR group_id= '11' OR group_id= '12' OR group_id= '14' OR group_id= '15' OR group_id= '10' OR group_id= '28' OR group_id= '29' OR group_id= '30' OR group_id= '31' OR group_id= '64' OR group_id= '65' OR group_id= '66')";
$rezultatrola = mysqli_query($polaczenie, $zapytanierola);
$rowrola = mysqli_fetch_assoc($rezultatrola);
$rola = $rowrola['group_id'];
	
if($online == 1){
$status = "Online";
}else{
$status = "Offline";
}
	
if($online == 1 && ($rola==10 || $rola==28 || $rola==29 || $rola==30 || $rola==31 || $rola==64 || $rola==65)){
$statusimg = "onlineadmin";
}elseif($online == 1){
$statusimg = "online";
}else{
$statusimg = "offline";
}
		
echo<<<END
		
<tr><td>$miejsce.</td><td><img src='inc/ikony/status/$statusimg.png' data-toggle='tooltip-arrow' data-placement='top' title='$status'/><a href='panel/?id=$id' style='text-decoration : none; color : #ffffff;'><strong data-toggle="tooltip-arrow" data-placement="top" title="$id">$nick</strong></a></td><td class='text-right'>$wynik</td></tr>
		
END;

	};



echo<<<END
															</tbody>
															</table>
															
														</div>
													</div>
												</div>
										
									
											</div>												
										</div>	


									</div>
					<div class="col-md-3">
END;
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/sidebar.php';
?>
					</div>
					
				</div>
				
			</section>
		
		</section>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/footer.php'; ?>
	</body>
</html>