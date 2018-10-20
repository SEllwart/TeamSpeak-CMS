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
					<h3 class="page-header"><i class="fa fa-id-card-o" aria-hidden="true"></i> Wizytówka <strong>Użytkownika</strong></h3>
						<div class="row">
							<div class="col-md-6">
									<div class="panel panel-group bg-light" style="box-shadow:10px 10px 20px -2px rgba(0,0,0,0.73);">
										<div class="panel  panel-default">
											<div class="panel-heading bg-black font-white">
												<h4>Podstawowe informacje</h4>
											</div>
		
<?php 
ini_set("display_errors", 0);
require_once 'dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password, false);

// Pobranie id uzytkownika
$userid = htmlspecialchars($_GET["id"]);



// Baza Bot
mysqli_select_db($polaczenie, $database2);

//status online
$zapytanieonline = "SELECT * FROM user WHERE cldbid=$userid";
$rezultatonline = mysqli_query($polaczenie, $zapytanieonline);
$rowonline = mysqli_fetch_assoc($rezultatonline);
$online = $rowonline['online'];

// Pobranie uuid uzytkownika
$uuid = $rowonline['uuid'];

//łączne online
$zapytanielaczneonline = "SELECT * FROM user WHERE cldbid=$userid";
$rezultatlaczneonline = mysqli_query($polaczenie, $zapytanielaczneonline);
$rowlaczneonline = mysqli_fetch_assoc($rezultatlaczneonline);
$czonline = $rowlaczneonline['count'];
$laczneonlinedni= gmdate("d", $czonline)-1;
$laczneonline= gmdate("H:m:s", $czonline);
$laczneonlinegodz= gmdate("H", $czonline);
$laczneonlinemin= gmdate("i", $czonline);
$laczneonlinesec= gmdate("s", $czonline);

//łączne idle
$zapytanielaczneidle = "SELECT * FROM user WHERE cldbid=$userid";
$rezultatlaczneidle = mysqli_query($polaczenie, $zapytanielaczneidle);
$rowlaczneidle = mysqli_fetch_assoc($rezultatlaczneidle);
$lidle = $rowlaczneidle['idle'];
$idle= gmdate("H:m:s", $lidle);
$idledni= gmdate("d", $lidle)-1;
$idlegodz= gmdate("H", $lidle);
$idlemin= gmdate("i", $lidle);
$idlesec= gmdate("s", $lidle);

//kraj
$zapytaniekraj = "SELECT * FROM user WHERE cldbid=$userid";
$rezultatkraj = mysqli_query($polaczenie, $zapytaniekraj);
$rowkraj = mysqli_fetch_assoc($rezultatkraj);
$krajj = $rowkraj['nation'];
$ilekraj = mysqli_num_rows($rezultatkraj);
$kraj = strtolower($krajj);

//ostatnio online
$zapytanieostatnioonline = "SELECT * FROM user WHERE cldbid=$userid";
$rezultatostatnioonline = mysqli_query($polaczenie, $zapytanieostatnioonline);
$rowostatnioonline = mysqli_fetch_assoc($rezultatostatnioonline);
$ostatnioonline1 = $rowostatnioonline['lastseen'] + 3600;
$ostatnioonline = gmdate("d-m-Y (H:i:s)", $ostatnioonline1);


// Baza TS
mysqli_select_db($polaczenie, $database);

//sprawdzenie banów
$zapytanieban = "SELECT * FROM `bans` WHERE `ban_uid` = '$uuid'";
$rezultatban = mysqli_query($polaczenie, $zapytanieban);
$rowban = mysqli_fetch_assoc($rezultatban);
$ban = $rowban['ban_id'];
$nadawcabana = $rowban['ban_invoker_name'];
$powodbana = $rowban['ban_reason'];
$kiedynadanobanats = $rowban['ban_timestamp'] + 3600;
$kiedynadanobana = gmdate("d-m-Y (H:i:s)", $kiedynadanobanats);
$czasbanastamp = $rowban['ban_length'];
$banwygasa = gmdate("H:i:s", $czasbanastamp);
$ileban = mysqli_num_rows($rezultatban);
if($banwygasa ==0){
	$banwygasa ="Permanentnie!";
}

// Wyciaganie id grup
$zapytanie = "SELECT * FROM group_server_to_client WHERE id1=$userid";
$rezultat = mysqli_query($polaczenie, $zapytanie);
$ile = mysqli_num_rows($rezultat);

// Wyciaganie nicku
$zapytanienick = "SELECT * FROM clients WHERE client_id=$userid";
$rezultatnick = mysqli_query($polaczenie, $zapytanienick);
$rownick = mysqli_fetch_assoc($rezultatnick);
$usernazwa = $rownick['client_nickname'];
$ilenick = mysqli_num_rows($rezultatnick);

//iP
$ip = $rownick['client_lastip'];

// pierwsze połączenie
$zapytaniedata = "SELECT * FROM client_properties WHERE id=$userid";
$rezultatdata = mysqli_query($polaczenie, $zapytaniedata);
$rowdata = mysqli_fetch_assoc($rezultatdata);
$pierwszepoloczenieunix = $rowdata['value'];

$date = date_create();

date_timestamp_set($date, $pierwszepoloczenieunix);

// liczba połączeń
$zapytanieliczba = "SELECT * FROM clients WHERE client_id=$userid";
$rezultatliczba = mysqli_query($polaczenie, $zapytanieliczba);
$rowliczba = mysqli_fetch_assoc($rezultatliczba);
$liczba = $rowliczba['client_totalconnections'];

//sprawdzenie AFK
$zapytaniestatusafk = "SELECT * FROM group_server_to_client WHERE id1=$userid AND (group_id= '199' OR group_id= '193')";
$rezultatstatusafk = mysqli_query($polaczenie, $zapytaniestatusafk);
$rowstatusafk = mysqli_fetch_assoc($rezultatstatusafk);
$statusafk = $rowstatusafk['group_id'];
$ilestatusafk = mysqli_num_rows($rezultatstatusafk);

// Rola
$zapytanierola = "SELECT * FROM group_server_to_client WHERE id1=$userid AND (group_id= '8' OR group_id= '11' OR group_id= '12' OR group_id= '14' OR group_id= '15' OR group_id= '10' OR group_id= '28' OR group_id= '29' OR group_id= '30' OR group_id= '31' OR group_id= '64' OR group_id= '65' OR group_id= '66')";
$rezultatrola = mysqli_query($polaczenie, $zapytanierola);
$rowrola = mysqli_fetch_assoc($rezultatrola);
$rola = $rowrola['group_id'];
$ilerola = mysqli_num_rows($rezultatrola);

// Wyciaganie nazwy roli
		$zapytanienazwaroli = "SELECT * FROM groups_server WHERE group_id=".$rola;
		$rezultatnazwaroli = mysqli_query($polaczenie, $zapytanienazwaroli);
		
		$rownazwaroli = mysqli_fetch_assoc($rezultatnazwaroli);
		$nazwaroli = $rownazwaroli['name'];
		
if($ileban >= 1){
	$rola = "Ban";
	$nazwaroli = "Zablokowany";
}
	
// woj
$zapytaniewoj = "SELECT * FROM group_server_to_client WHERE id1=$userid AND (group_id= '42' OR group_id= '43' OR group_id= '44' OR group_id= '45' OR group_id= '46' OR group_id= '47' OR group_id= '48' OR group_id= '49' OR group_id= '50' OR group_id= '51' OR group_id= '52' OR group_id= '53' OR group_id= '54' OR group_id= '55' OR group_id= '56' OR group_id= '57' OR group_id= '58')";
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
$zapytaniewiek = "SELECT * FROM group_server_to_client WHERE id1=$userid AND (group_id= '26' OR group_id= '32' OR group_id= '33' OR group_id= '34' OR group_id= '35' OR group_id= '36' OR group_id= '37' OR group_id= '38' OR group_id= '39')";
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
$zapytanieplec = "SELECT * FROM group_server_to_client WHERE id1=$userid AND (group_id= '40' OR group_id= '41')";
$rezultatplec = mysqli_query($polaczenie, $zapytanieplec);
$rowplec = mysqli_fetch_assoc($rezultatplec);
$plec = $rowplec['group_id'];
$ileplec = mysqli_num_rows($rezultatplec);
// Wyciaganie nazwy płci
		$zapytanienazwaplec = "SELECT * FROM groups_server WHERE group_id=".$plec;
		$rezultatnazwaplec = mysqli_query($polaczenie, $zapytanienazwaplec);
		
		$rownazwaplec = mysqli_fetch_assoc($rezultatnazwaplec);
		$nazwaplec = $rownazwaplec['name'];
		
//Opis użytkownika
$zapytanieopis = "SELECT * FROM client_properties WHERE id=$userid AND ident='client_description'";
$rezultatopis = mysqli_query($polaczenie, $zapytanieopis);
$rowopis = mysqli_fetch_assoc($rezultatopis);
$opis = $rowopis['value'];
if (empty($opis)) {
$opis = "{Użytkownik nie ustawił opisu}";
}
	
//online cd.	 AFK L4
if ($online == 1 && $statusafk == 199) {
	$status = "AFK";
}elseif ($online == 1 && $statusafk == 193){
	$status = "L4";
}elseif ($online == 0){
	$status = "Offline";
} else{
	$status = "Online";
}
if ($online == 1 && ($rola==10 || $rola==28 || $rola==29 || $rola==30 || $rola==31 || $rola==64 || $rola==65)) {
	$statusikona = "onlineadmin";
}elseif ($online == 1){
	$statusikona = "online";
}else{
	$statusikona = "offline";
}
		
echo<<<END


			<div class="panel-body bg-middle"><h1 style="margin-top:10px;"><img src='http://iperion.pl/inc/ikony/status/$statusikona.png' data-toggle='tooltip-arrow' data-placement='top' title='$status'/><strong data-toggle="tooltip-arrow" data-placement="top" title="$userid">$usernazwa</strong></h1>

END;



if($ileban >=1){
	
echo<<<END
<div class="alert alert-danger" role="alert">

	<blockquote style="margin:0;">
	
		<strong>Użytkownik Zablokowany!</strong>
		<footer>Nadany przez: <strong>$nadawcabana</strong></footer>
		<footer>Powód: <strong>$powodbana</strong></footer>
		<footer>Data nadania: <strong>$kiedynadanobana</strong></footer>
		<footer>Czas trwania: <strong>$banwygasa</strong></footer>
	</blockquote>
	
</div>
END;


}else{
	
if ($ilenick>=1) 
{

echo<<<END

			<blockquote style="margin:0;">

END;
	

}
	
echo<<<END

			<p>Rangi: <span class='label label-default'> 
END;
	
if ($ile>=1){
	
	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat);
		$idgrupy = $row['group_id'];
		
		// Wyciaganie nazw grup
		$zapytanienazwagrupy = "SELECT * FROM groups_server WHERE group_id=".$idgrupy;
		$rezultatnazwagrupy = mysqli_query($polaczenie, $zapytanienazwagrupy);
		
		$rownazwagrupy = mysqli_fetch_assoc($rezultatnazwagrupy);
		$nazwagrupy = $rownazwagrupy['name'];
		
		// Wyciaganie ikony grupy

echo "<img src='http://iperion.pl/inc/ranking/icons/".$idgrupy.".png' data-toggle='tooltip-arrow' data-placement='top' title='$nazwagrupy'/> ";

	}

	
}else{
echo "<img src='http://iperion.pl/inc/ranking/icons/niezarejestrowany.png' data-toggle='tooltip-arrow' data-placement='top' title='Niezarejestrowany'/> Niezarejestrowany ";
}
	
echo<<<END
		</span>
	</p>
END;
	

echo<<<END

	<footer>Aktualnie $status</footer>
END;
	
if ($status == "Offline"){
	echo "<footer>Ostatno online: $ostatnioonline</footer>";
}
	
echo "</blockquote>";

}
echo<<<END

											</div>
										</div>
									</div>
									<div class="panel panel-group bg-light" style="box-shadow:10px 10px 20px -2px rgba(0,0,0,0.73);">
										<div class="panel  panel-default">
											<div class="panel-heading bg-black font-white">
												<h4>Dane użytkownika</h4>
											</div>
											<div class="panel-body bg-middle">
												<table class="table table-condensed" style="margin-bottom: -14px;">
													<tbody>
END;
if ($ilerola>=1)
{
	echo "<tr><th>Funkcja:</th><td><span class='label label-default'><img src='http://iperion.pl/inc/ranking/icons/$rola.png' data-toggle='tooltip-arrow' data-placement='top' title='$rola'/> $nazwaroli</span></td></tr>";
}elseif($ileban >=1){
	echo "<tr><th>Funkcja:</th><td><span class='label label-default'><img src='http://iperion.pl/inc/ranking/icons/ban.png' data-toggle='tooltip-arrow' data-placement='top' title='Ban'/> Zablokowany</span></td></tr>";
}else{
	echo "<tr><th>Funkcja:</th><td><span class='label label-default'><img src='http://iperion.pl/inc/ranking/icons/niezarejestrowany.png' data-toggle='tooltip-arrow' data-placement='top' title='8'/> Niezarejestrowany</span></td></tr>";
}
if ($ilewiek>=1) 
{
	echo "<tr><th>Wiek:</th><td><span class='label label-default'><img src='http://iperion.pl/inc/ranking/icons/$wiek.png' data-toggle='tooltip-arrow' data-placement='top' title='$wiek'/> $nazwawiek</span></td></tr>";
}
if ($ileplec>=1)
{
	echo "<tr><th>Płeć:</th><td><span class='label label-default'><img src='http://iperion.pl/inc/ranking/icons/$plec.png' data-toggle='tooltip-arrow' data-placement='top' title='$plec'/> $nazwaplec</span></td></tr>";
}
if ($ilekraj>=1)
{
	echo "<tr><th>Kraj:</th><td><span class='label label-default'><img src='http://iperion.pl/inc/ikony/kraje/$kraj.png' data-toggle='tooltip-arrow' data-placement='top' title='$kraj'/> $krajj</span></td></tr>";
}
if ($ilewoj>=1 && $kraj =="pl")
{
	echo "<tr><th>Województwo: </th><td><span class='label label-default'><img src='http://iperion.pl/inc/ranking/icons/$woj.png' data-toggle='tooltip-arrow' data-placement='top' title='$woj'/> $nazwawoj</span></td></tr>";
}

echo<<<END
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
								<div class="panel panel-group bg-light" style="box-shadow:10px 10px 20px -2px rgba(0,0,0,0.73);">
										<div class="panel  panel-default bg-middle">
											<div class="panel-heading bg-black font-white">
												<h4>Osiągnięcia</h4>
											</div>
											<div class="panel-body bg-middle">
											
END;


// a1
$zapytaniea1 = "SELECT * FROM group_server_to_client WHERE id1=$userid AND ((`group_id` = 157 OR `group_id` = 165 OR `group_id` = 168 OR `group_id` = 169 OR `group_id` = 171 OR `group_id` = 173 OR `group_id` = 174 OR `group_id` = 176 OR `group_id` = 178 OR `group_id` = 180 OR `group_id` = 181 OR `group_id` = 182 OR `group_id` = 184 OR `group_id` = 186 OR `group_id` = 187 OR `group_id` = 189 OR `group_id` = 190 OR `group_id` = 196 OR `group_id` = 198 OR `group_id` = 200 OR `group_id` = 201 OR `group_id` = 203 OR `group_id` = 206 OR `group_id` = 208 OR `group_id` = 210) OR (`group_id`= 231))";
$rezultata1 = mysqli_query($polaczenie, $zapytaniea1);
$ilea1 = mysqli_num_rows($rezultata1);

		
for ($i = 1; $i <= $ilea1; $i++) 
	{
		
		$rowa1 = mysqli_fetch_assoc($rezultata1);
		$a1 = $rowa1['group_id'];
		
		// Wyciaganie nazwy wieku
		$zapytanienazwaa1 = "SELECT * FROM groups_server WHERE group_id=".$a1;
		$rezultatnazwaa1 = mysqli_query($polaczenie, $zapytanienazwaa1);
		
		$rownazwaa1 = mysqli_fetch_assoc($rezultatnazwaa1);
		$nazwaa1 = $rownazwaa1['name'];

echo "<h4><span class='label label-success' style='margin-right:5px; float:left;'><img src='http://iperion.pl/inc/ranking/icons/$a1.png' data-toggle='tooltip-arrow' data-placement='top' title='$a1'/> $nazwaa1</span></h4>";

}
									
echo<<<END
								
												</div>
											</div>
										</div>
										
								</div>
								<div class="col-md-6">

								<div class="well bg-middle" style="box-shadow:10px 10px 20px -2px rgba(0,0,0,0.73);">
											<blockquote style="border-color:#ddd; margin:0;">
											$opis
											</blockquote>
										</div>
										
END;

// Klan
$zapytanieklan = "SELECT * FROM group_server_to_client WHERE id1=$userid AND (group_id= '59' OR group_id= '60' OR group_id= '61')";
$rezultatklan = mysqli_query($polaczenie, $zapytanieklan);

$ileklan = mysqli_num_rows($rezultatklan);

if ($ileklan>=1){

echo<<<END
<div class="panel panel-group bg-light" style="box-shadow:10px 10px 20px -2px rgba(0,0,0,0.73);">
										<div class="panel  panel-default bg-middle">
											<div class="panel-heading bg-black font-white">
												<h4>Grupy / Klany</h4>
											</div>
											<div class="panel-body bg-middle" style='padding-top:0;'>
END;
	
	for ($i = 1; $i <= $ileklan; $i++) 
	{
		
		$rowklan = mysqli_fetch_assoc($rezultatklan);
		$klan = $rowklan['group_id'];
		
		// Wyciaganie nazwy Klanu
		$zapytanienazwaklan = "SELECT * FROM groups_server WHERE group_id=".$klan;
		$rezultatnazwaklan = mysqli_query($polaczenie, $zapytanienazwaklan);
		
		$rownazwaklan = mysqli_fetch_assoc($rezultatnazwaklan);
		$nazwaklan = $rownazwaklan['name'];

echo "<h3><span class='label label-info' style='float:left; margin-right:5px; margin-bottom:5px;'><img src='http://iperion.pl/inc/ranking/icons/$klan.png' data-toggle='tooltip-arrow' data-placement='top' title='$nazwaklan'/> $nazwaklan</span></h3>";

}
echo<<<END
												</div>
											</div>
										</div>
END;
}

echo<<<END
								
									<div class="panel panel-group bg-light" style="box-shadow:10px 10px 20px -2px rgba(0,0,0,0.73);">
										<div class="panel  panel-default bg-middle">
											<div class="panel-heading bg-black font-white">
												<h4>Statystyki</h4>
											</div>
											<div class="panel-body bg-middle">
											<table class="table table-condensed" style="margin-bottom: -14px;">
												<tbody>
											<tr><th>Dołączył:</th><td><span class="label label-default">
END;
											 echo date_format($date, 'Y-m-d H:i:s') . "\n </span></td></tr>"; 
											 
											 echo "<tr><th>Liczba połączeń:</th><td><span class='label label-default'>$liczba</span></td></tr>";
											 
											 echo "<tr><th>Łącznie online:</th><td><span class='label label-default'>$laczneonlinedni dni, $laczneonlinegodz godz, $laczneonlinemin min, $laczneonlinesec sek.</span></td></tr>";
											 
											 echo "<tr><th>Czas spędzony AFK:</th><td><span class='label label-default'>$idledni dni, $idlegodz godz, $idlemin min, $idlesec sek.</span></td></tr>";
											 
											
echo<<<END

	</tbody>
</table>
												</div>
											</div>
										</div>
END;





		

									
?>									
									
							</div>
						</div>
					</div>
					<div class="col-md-3 bg-dark">
<?php include '../inc/sidebar.php'; ?>
					</div>
				</div>
				
			</section>		
	</section>
<?php include '../inc/footer.php'; ?>
</body>
</html>
