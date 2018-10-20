<!DOCTYPE html>
<html lang="pl">
  <head>
<?php
require '../inc/head.php';
?>
  </head>
  <a name="nav"/>
  <body class="bg-dark czcionka-1">
  

<?php
include '../inc/nav.php';
?>
		
		<section class="container-fluid font-white padding-0">
			<div class="container padding-20">
				<!-- przerywnik -->
			</div>

			<section class="container">
				
				<div class="row">
					<div class="col-md-9">
						<h3 class="page-header"><i class="fa fa-server" aria-hidden="true"></i> Nasza <strong>ekipa</strong></h3>
						
						
							
											<div class="row">
												<div class="col-md-6">
								
										
										
											
														
<?php
										
ini_set("display_errors", 0);
require_once '../panel/dbconnect.php';

$polaczenie = mysqli_connect($host, $user, $password, false);

// Baza TS
mysqli_select_db($polaczenie, $database);

// Wyciaganie id roota
$zapytanieroot = "SELECT * FROM group_server_to_client WHERE group_id= '10'";
$rezultatroot = mysqli_query($polaczenie, $zapytanieroot);

$ileroot= mysqli_num_rows($rezultatroot);




	for ($i = 1; $i <= $ileroot; $i++) 
	{
		
		$rowroot = mysqli_fetch_assoc($rezultatroot);
		$root = $rowroot['id1'];
		
		// Wyciaganie nicku root
		$zapytanienick = "SELECT * FROM clients WHERE client_id=$root";
		$rezultatnick = mysqli_query($polaczenie, $zapytanienick);
		$rownick = mysqli_fetch_assoc($rezultatnick);
		$usernazwa = $rownick['client_nickname'];
		
		// Baza Bot
		mysqli_select_db($polaczenie, $database2);

		//status online
		$zapytanieonline = "SELECT * FROM user WHERE cldbid=$root";
		$rezultatonline = mysqli_query($polaczenie, $zapytanieonline);
		$rowonline = mysqli_fetch_assoc($rezultatonline);
		$online = $rowonline['online'];
		
		mysqli_select_db($polaczenie, $database);
		
		
//sprawdzenie AFK
$zapytaniestatusafk = "SELECT * FROM group_server_to_client WHERE id1=$root AND (group_id= '229' OR group_id= '230')";
$rezultatstatusafk = mysqli_query($polaczenie, $zapytaniestatusafk);
$rowstatusafk = mysqli_fetch_assoc($rezultatstatusafk);
$statusafk = $rowstatusafk['group_id'];
$ilestatusafk = mysqli_num_rows($rezultatstatusafk);
		
if ($online == 1 && $statusafk == 229) {
	$status = "AFK";
}elseif ($online == 1 && $statusafk == 230){
	$status = "L4";
}elseif ($online == 0){
	$status = "Offline";
} else{
	$status = "Online";
}
if ($online == 1) {
	$statusikona = "onlineadmin";
}else{
	$statusikona = "offline";
}
		
		if($online==1){
echo<<<END
<div class="well bg-middle">
<h1><a href='http://iperion.pl/panel/?id=$root' style='text-decoration : none; color : #ffffff;' ><img src='http://iperion.pl/inc/ikony/status/$statusikona.png' data-toggle='tooltip-arrow' data-placement='top' title='$status'/><strong data-toggle="tooltip-arrow" data-placement="top" title="$root">$usernazwa</strong></a></h1>
<blockquote style="border-color:#EEEEEE !important;">
<p>Funkcja: <span class='label label-default'><img src='http://iperion.pl/inc/ranking/icons/10.png' data-toggle='tooltip-arrow' data-placement='top' title='ROOT'/> ROOT</span></p>
<footer>Aktualnie $status</footer>
</blockquote>
</div>
END;
			
		}else{
echo<<<END
<div class="well bg-middle">
<h1><a href='http://iperion.pl/panel/?id=$root' style='text-decoration : none; color : #ffffff;' ><img src='http://iperion.pl/inc/ikony/status/$statusikona.png' data-toggle='tooltip-arrow' data-placement='top' title='$status'/><strong data-toggle="tooltip-arrow" data-placement="top" title="$root">$usernazwa</strong></a></h1>
<blockquote style="border-color:#EEEEEE !important;">
<p>Funkcja: <span class='label label-default'><img src='http://iperion.pl/inc/ranking/icons/10.png' data-toggle='tooltip-arrow' data-placement='top' title='ROOT'/> ROOT</span></p>
<footer>Aktualnie Offline</footer>
</blockquote>
</div>
END;
		}

	}

?>
										
									
								
							
						</div>
						</div>
					
					</div>
					<div class="col-md-3">
<?php include '../inc/sidebar.php'; ?>
					</div>
				</div>
				
			</section>

		</section>
<?php include '../inc/footer.php'; ?>
	</body>
</html>