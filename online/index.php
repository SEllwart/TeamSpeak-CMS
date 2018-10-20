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
						
												<h3 class="page-header"><i class="fa fa-server" aria-hidden="true"></i> Aktualnie <strong>online</strong></h3>
													<div class="well bg-middle container-fluid">
									<table class="table table-condensed">
<tbody>
													
<?PHP
session_start();
$starttime = microtime(true);
require_once '../panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password, false);
mysqli_select_db($polaczenie, $database2);
$zapytanieranking = "SELECT * FROM user WHERE  online=1";
$rezultatranking = mysqli_query($polaczenie, $zapytanieranking);
$ileranking = mysqli_num_rows($rezultatranking);



for ($i = 1; $i <= $ileranking; $i++) 
	{
		$rowranking = mysqli_fetch_assoc($rezultatranking);
		$miejsce = $i;
		$id = $rowranking['cldbid'];
		$wynik = $rowranking['count'];
		$online = $rowranking['online'];
		
mysqli_select_db($polaczenie, $database);
$zapytanienick = "SELECT * FROM clients WHERE client_id=$id";
$rezultatnick = mysqli_query($polaczenie, $zapytanienick);
$rownick = mysqli_fetch_assoc($rezultatnick);
$nick = $rownick['client_nickname'];

// Rola
$zapytanierola = "SELECT * FROM group_server_to_client WHERE id1=$id AND (group_id= '8' OR group_id= '11' OR group_id= '12' OR group_id= '14' OR group_id= '15' OR group_id= '10' OR group_id= '28' OR group_id= '29' OR group_id= '30' OR group_id= '31' OR group_id= '64' OR group_id= '65' OR group_id= '66')";
$rezultatrola = mysqli_query($polaczenie, $zapytanierola);
$rowrola = mysqli_fetch_assoc($rezultatrola);
$rola = $rowrola['group_id'];
$ilerola = mysqli_num_rows($rezultatrola);

// Wyciaganie nazwy roli
		$zapytanienazwaroli = "SELECT * FROM groups_server WHERE group_id=".$rola;
		$rezultatnazwaroli = mysqli_query($polaczenie, $zapytanienazwaroli);
		
		$rownazwaroli = mysqli_fetch_assoc($rezultatnazwaroli);
		$nazwaroli = $rownazwaroli['name'];
		
// woj
$zapytaniewoj = "SELECT * FROM group_server_to_client WHERE id1=$id AND (group_id= '42' OR group_id= '43' OR group_id= '44' OR group_id= '45' OR group_id= '46' OR group_id= '47' OR group_id= '48' OR group_id= '49' OR group_id= '50' OR group_id= '51' OR group_id= '52' OR group_id= '53' OR group_id= '54' OR group_id= '55' OR group_id= '56' OR group_id= '57' OR group_id= '58')";
$rezultatwoj = mysqli_query($polaczenie, $zapytaniewoj);
$rowwoj = mysqli_fetch_assoc($rezultatwoj);
$woj = $rowwoj['group_id'];
$ilewoj = mysqli_num_rows($rezultatwoj);
// Wyciaganie nazwy woj
		$zapytanienazwawoj = "SELECT * FROM groups_server WHERE group_id=".$woj;
		$rezultatnazwawoj = mysqli_query($polaczenie, $zapytanienazwawoj);
		
		$rownazwawoj = mysqli_fetch_assoc($rezultatnazwawoj);
		$nazwawoj = $rownazwawoj['name'];
		
// wiek
$zapytaniewiek = "SELECT * FROM group_server_to_client WHERE id1=$id AND (group_id= '26' OR group_id= '32' OR group_id= '33' OR group_id= '34' OR group_id= '35' OR group_id= '36' OR group_id= '37' OR group_id= '38' OR group_id= '39')";
$rezultatwiek = mysqli_query($polaczenie, $zapytaniewiek);
$rowwiek = mysqli_fetch_assoc($rezultatwiek);
$wiek = $rowwiek['group_id'];
$ilewiek = mysqli_num_rows($rezultatwiek);
// Wyciaganie nazwy wieku
		$zapytanienazwawiek = "SELECT * FROM groups_server WHERE group_id=".$wiek;
		$rezultatnazwawiek = mysqli_query($polaczenie, $zapytanienazwawiek);
		
		$rownazwawiek = mysqli_fetch_assoc($rezultatnazwawiek);
		$nazwawiek = $rownazwawiek['name'];
		
// płeć
$zapytanieplec = "SELECT * FROM group_server_to_client WHERE id1=$id AND (group_id= '40' OR group_id= '41')";
$rezultatplec = mysqli_query($polaczenie, $zapytanieplec);
$rowplec = mysqli_fetch_assoc($rezultatplec);
$plec = $rowplec['group_id'];
$ileplec = mysqli_num_rows($rezultatplec);
// Wyciaganie nazwy płci
		$zapytanienazwaplec = "SELECT * FROM groups_server WHERE group_id=".$plec;
		$rezultatnazwaplec = mysqli_query($polaczenie, $zapytanienazwaplec);
		
		$rownazwaplec = mysqli_fetch_assoc($rezultatnazwaplec);
		$nazwaplec = $rownazwaplec['name'];


echo<<<END
<h3 style="margin:5px;"><tr><th><a href='http://iperion.pl/panel/?id=$id' style='text-decoration : none; color : #ffffff;' ><img src='http://iperion.pl/inc/ikony/status/online.png' data-toggle='tooltip-arrow' data-placement='top' title='online'/><strong data-toggle="tooltip-arrow" data-placement="top" title="$id">$nick</strong></th><th class='text-right'> <span class="label label-default">
END;



if ($ilewoj>=1)
{
	echo "<img src='http://iperion.pl/inc/ranking/icons/$woj.png' data-toggle='tooltip-arrow' data-placement='top' title='$nazwawoj'/> ";
}else{
	echo " ";
}
if ($ileplec>=1)
{
	echo "<img src='http://iperion.pl/inc/ranking/icons/$plec.png' data-toggle='tooltip-arrow' data-placement='top' title='$nazwaplec'/> ";
}else{
	echo " ";
}
if ($ilewiek>=1)
{
	echo "<img src='http://iperion.pl/inc/ranking/icons/$wiek.png' data-toggle='tooltip-arrow' data-placement='top' title='$nazwawiek'/> ";
}else{
	echo " ";
}
if ($ilerola>=1)
{
	echo "<img src='http://iperion.pl/inc/ranking/icons/$rola.png' data-toggle='tooltip-arrow' data-placement='top' title='$nazwaroli'/> ";
}else{
	echo "<img src='http://iperion.pl/inc/ranking/icons/niezarejestrowany.png' data-toggle='tooltip-arrow' data-placement='top' title='Niezarejestrowany'/>";
}
echo<<<END
</span></a></th></tr></h3>
END;


	}

?>				
			<tr><th></th><th></th></tr>
		</tbody>
</table>									
													
							
												
								
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