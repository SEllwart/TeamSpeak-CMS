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
						<h3 class="page-header"><i class="fa fa-list-ul"></i> Spis grup <strong>iPerion.pl</strong></h3>
						
							<div class="row">
						
							<div class="col-md-6">
							
							<div class="well bg-middle container-fluid">
								<h4>Administracja</h4>
							
								<table class="table table-condensed" style="margin-bottom: -14px;">
									<tbody>
									
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/10.png" /></td><td class="text-right">ROOT</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/28.png" /></td><td class="text-right">vROOT</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/29.png" /></td><td class="text-right">Specjal Admin</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/30.png" /></td><td class="text-right">Administrator</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/31.png" /></td><td class="text-right">Moderator</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/64.png" /></td><td class="text-right">Stażysta</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/65.png" /></td><td class="text-right">Pomocnik</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/66.png" /></td><td class="text-right">Bot iPerion.pl</td></tr>
									
									</tbody>
								</table>
							</div>
							
							</div>
							<div class="col-md-6">
							
								<div class="well bg-middle container-fluid">
								<h4>Rejestracja</h4>
							
								<table class="table table-condensed" style="margin-bottom: -14px;">
									<tbody>
									
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/niezarejestrowany.png" /></td><td class="text-right">Niezarejestrowany</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/11.png" /></td><td class="text-right">Zarejestrowany/a</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/15.png" /></td><td class="text-right">Oczekujący na rejestracje</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/12.png" /></td><td class="text-right">Friend</td></tr>
										<tr><td><img src="http://iperion.pl/inc/ranking/icons/14.png" /></td><td class="text-right">Bot użytkownika</td></tr>
									
									</tbody>
								</table>
								</div>
							
							</div>
							
							</div>
							<div class="row">
						
							<div class="col-md-6">
								
								<div class="well bg-middle container-fluid">
								<h4>Województwa</h4>
							
								<table class="table table-condensed" style="margin-bottom: -14px;">
									<tbody>
									
<?PHP

require_once '../panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_select_db($polaczenie, $database);
$zapytanieg = "SELECT * FROM `perm_server_group` WHERE `perm_id` = 'i_group_sort_id' AND `perm_value` = 841 ORDER BY `id1` ASC";
$rezultatg = mysqli_query($polaczenie, $zapytanieg);
$ileg = mysqli_num_rows($rezultatg);


for ($i = 1; $i <= $ileg; $i++) 
	{
		$rowg = mysqli_fetch_assoc($rezultatg);
		$id = $rowg['id1'];

$zapytanienazwagrupy= "SELECT *  FROM `groups_server` WHERE `group_id` = $id";
$rezultatnazwagrupy = mysqli_query($polaczenie, $zapytanienazwagrupy);
$rownazwagrupy = mysqli_fetch_assoc($rezultatnazwagrupy);
$nazwagrupy = $rownazwagrupy['name'];

echo<<<END

	<tr><td><img src="http://iperion.pl/inc/ranking/icons/$id.png" /></td><td class="text-right">$nazwagrupy</td></tr>

END;

	}

?>
									
									</tbody>
								</table>
								</div>
								
								<div class="well bg-middle container-fluid">
								<h4>Specjalne</h4>
							
								<table class="table table-condensed" style="margin-bottom: -14px;">
									<tbody>
									
<?PHP

require_once '../panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_select_db($polaczenie, $database);
$zapytanieg = "SELECT * FROM `perm_server_group` WHERE `perm_id` = 'i_group_sort_id' AND `perm_value` = 301 ORDER BY `id1` ASC";
$rezultatg = mysqli_query($polaczenie, $zapytanieg);
$ileg = mysqli_num_rows($rezultatg);


for ($i = 1; $i <= $ileg; $i++) 
	{
		$rowg = mysqli_fetch_assoc($rezultatg);
		$id = $rowg['id1'];

$zapytanienazwagrupy= "SELECT *  FROM `groups_server` WHERE `group_id` = $id";
$rezultatnazwagrupy = mysqli_query($polaczenie, $zapytanienazwagrupy);
$rownazwagrupy = mysqli_fetch_assoc($rezultatnazwagrupy);
$nazwagrupy = $rownazwagrupy['name'];

echo<<<END

	<tr><td><img src="http://iperion.pl/inc/ranking/icons/$id.png" /></td><td class="text-right">$nazwagrupy</td></tr>

END;

	}

?>
									
									</tbody>
								</table>
								</div>
							
							</div>
							<div class="col-md-6">
							
								<div class="well bg-middle container-fluid">
								<h4>Wiek</h4>
							
								<table class="table table-condensed" style="margin-bottom: -14px;">
									<tbody>
							
<?PHP

require_once '../panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_select_db($polaczenie, $database);
$zapytanieg = "SELECT * FROM `perm_server_group` WHERE `perm_id` = 'i_group_sort_id' AND `perm_value` = 871 ORDER BY `id1` ASC";
$rezultatg = mysqli_query($polaczenie, $zapytanieg);
$ileg = mysqli_num_rows($rezultatg);


for ($i = 1; $i <= $ileg; $i++) 
	{
		$rowg = mysqli_fetch_assoc($rezultatg);
		$id = $rowg['id1'];

$zapytanienazwagrupy= "SELECT *  FROM `groups_server` WHERE `group_id` = $id";
$rezultatnazwagrupy = mysqli_query($polaczenie, $zapytanienazwagrupy);
$rownazwagrupy = mysqli_fetch_assoc($rezultatnazwagrupy);
$nazwagrupy = $rownazwagrupy['name'];

echo<<<END

	<tr><td><img src="http://iperion.pl/inc/ranking/icons/$id.png" /></td><td class="text-right">$nazwagrupy</td></tr>

END;

	}

?>
									
									</tbody>
								</table>
							</div>
							
							<div class="well bg-middle container-fluid">
								<h4>Płeć</h4>
							
								<table class="table table-condensed" style="margin-bottom: -14px;">
									<tbody>
									
<?PHP

require_once '../panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_select_db($polaczenie, $database);
$zapytanieg = "SELECT * FROM `perm_server_group` WHERE `perm_id` = 'i_group_sort_id' AND `perm_value` = 861 ORDER BY `id1` ASC";
$rezultatg = mysqli_query($polaczenie, $zapytanieg);
$ileg = mysqli_num_rows($rezultatg);


for ($i = 1; $i <= $ileg; $i++) 
	{
		$rowg = mysqli_fetch_assoc($rezultatg);
		$id = $rowg['id1'];

$zapytanienazwagrupy= "SELECT *  FROM `groups_server` WHERE `group_id` = $id";
$rezultatnazwagrupy = mysqli_query($polaczenie, $zapytanienazwagrupy);
$rownazwagrupy = mysqli_fetch_assoc($rezultatnazwagrupy);
$nazwagrupy = $rownazwagrupy['name'];

echo<<<END

	<tr><td><img src="http://iperion.pl/inc/ranking/icons/$id.png" /></td><td class="text-right">$nazwagrupy</td></tr>

END;

	}

?>
									
									</tbody>
								</table>
								</div>
							
							<div class="well bg-middle container-fluid">
								<h4>Eventy / Nagrody</h4>
							
								<table class="table table-condensed" style="margin-bottom: -14px;">
									<tbody>
									
<?PHP

require_once '../panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_select_db($polaczenie, $database);
$zapytanieg = "SELECT * FROM `perm_server_group` WHERE `perm_id` = 'i_group_sort_id' AND `perm_value` = 401 ORDER BY `id1` ASC";
$rezultatg = mysqli_query($polaczenie, $zapytanieg);
$ileg = mysqli_num_rows($rezultatg);


for ($i = 1; $i <= $ileg; $i++) 
	{
		$rowg = mysqli_fetch_assoc($rezultatg);
		$id = $rowg['id1'];

$zapytanienazwagrupy= "SELECT *  FROM `groups_server` WHERE `group_id` = $id";
$rezultatnazwagrupy = mysqli_query($polaczenie, $zapytanienazwagrupy);
$rownazwagrupy = mysqli_fetch_assoc($rezultatnazwagrupy);
$nazwagrupy = $rownazwagrupy['name'];

echo<<<END

	<tr><td><img src="http://iperion.pl/inc/ranking/icons/$id.png" /></td><td class="text-right">$nazwagrupy</td></tr>

END;

	}

?>
									
									</tbody>
								</table>
								</div>
								
							<div class="well bg-middle container-fluid">
								<h4>Klany</h4>
							
								<table class="table table-condensed" style="margin-bottom: -14px;">
									<tbody>
									
<?PHP

require_once '../panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_select_db($polaczenie, $database);
$zapytanieg = "SELECT * FROM `perm_server_group` WHERE `perm_id` = 'i_group_sort_id' AND `perm_value` = 801 ORDER BY `id1` ASC";
$rezultatg = mysqli_query($polaczenie, $zapytanieg);
$ileg = mysqli_num_rows($rezultatg);


for ($i = 1; $i <= $ileg; $i++) 
	{
		$rowg = mysqli_fetch_assoc($rezultatg);
		$id = $rowg['id1'];

$zapytanienazwagrupy= "SELECT *  FROM `groups_server` WHERE `group_id` = $id";
$rezultatnazwagrupy = mysqli_query($polaczenie, $zapytanienazwagrupy);
$rownazwagrupy = mysqli_fetch_assoc($rezultatnazwagrupy);
$nazwagrupy = $rownazwagrupy['name'];

echo<<<END

	<tr><td><img src="http://iperion.pl/inc/ranking/icons/$id.png" /></td><td class="text-right">$nazwagrupy</td></tr>

END;

	}

?>
									
									</tbody>
								</table>
								</div>
														
							</div>
							
							</div>
							
							<div class="alert alert-info" role="alert">
							
							<p>Poniższe rangi są rangami dodatkowymi i nie są obowiązkowe. <br />
							Maksymalna liczba posiadanych przez użytownika rang dodatkowych wynosi: <strong>5</strong>. <br />
							Użytkownicy VIP, Donatorzy, Specjal Userzy i Administracja mają zwiększony limit.</p>
							
							</div>
							
							<div class="row">
							<div class="col-md-6">
							
								<div class="well bg-middle container-fluid">
								<h4>Gry</h4>
							
								<table class="table table-condensed" style="margin-bottom: -14px;">
									<tbody>
									
<?PHP

require_once '../panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_select_db($polaczenie, $database);
$zapytanieg = "SELECT * FROM `perm_server_group` WHERE `perm_id` = 'i_group_sort_id' AND `perm_value` = 501 ORDER BY `id1` ASC";
$rezultatg = mysqli_query($polaczenie, $zapytanieg);
$ileg = mysqli_num_rows($rezultatg);


for ($i = 1; $i <= $ileg; $i++) 
	{
		$rowg = mysqli_fetch_assoc($rezultatg);
		$id = $rowg['id1'];

$zapytanienazwagrupy= "SELECT *  FROM `groups_server` WHERE `group_id` = $id";
$rezultatnazwagrupy = mysqli_query($polaczenie, $zapytanienazwagrupy);
$rownazwagrupy = mysqli_fetch_assoc($rezultatnazwagrupy);
$nazwagrupy = $rownazwagrupy['name'];

echo<<<END

	<tr><td><img src="http://iperion.pl/inc/ranking/icons/$id.png" /></td><td class="text-right">$nazwagrupy</td></tr>

END;

	}

?>	
									
									
										
									
									</tbody>
								</table>
								</div>
							
							</div>
							<div class="col-md-6">
							
								<div class="well bg-middle container-fluid">
								<h4>Tematyczne</h4>
							
								<table class="table table-condensed" style="margin-bottom: -14px;">
									<tbody>
									
<?PHP

require_once '../panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_select_db($polaczenie, $database);
$zapytanieg = "SELECT * FROM `perm_server_group` WHERE `perm_id` = 'i_group_sort_id' AND `perm_value` = 601 ORDER BY `id1` ASC";
$rezultatg = mysqli_query($polaczenie, $zapytanieg);
$ileg = mysqli_num_rows($rezultatg);


for ($i = 1; $i <= $ileg; $i++) 
	{
		$rowg = mysqli_fetch_assoc($rezultatg);
		$id = $rowg['id1'];

$zapytanienazwagrupy= "SELECT *  FROM `groups_server` WHERE `group_id` = $id";
$rezultatnazwagrupy = mysqli_query($polaczenie, $zapytanienazwagrupy);
$rownazwagrupy = mysqli_fetch_assoc($rezultatnazwagrupy);
$nazwagrupy = $rownazwagrupy['name'];

echo<<<END

	<tr><td><img src="http://iperion.pl/inc/ranking/icons/$id.png" /></td><td class="text-right">$nazwagrupy</td></tr>

END;

	}

?>
									
									</tbody>
								</table>
								</div>
							
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