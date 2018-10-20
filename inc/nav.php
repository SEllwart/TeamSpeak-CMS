<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom:0;box-shadow: 0px 0px 5px 3px rgba(0,0,0,1);">
			<div class="container">
				<div class="navbar-header">
				<a class="logo" href="/index.php">
					<img src="/inc/img/iP_logo_navbar.png" style="margin-top:5px;">
				</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav" style="margin-left:20px;">
			<li><a href="/index.php"><strong>Home</strong></a></li>
			<li class="dropdown">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle"><strong>O nas</strong><b class="caret"></b></a>
					<ul class="dropdown-menu">
                            <li><a href="/ekipa">Administracja</a></li>
                            <li><a href="/regulamin">Regulamin</a></li>
							<li><a href="/online">Lista online</a></li>
                    </ul>
			</li>
			<li><a href="/spolecznosc"><strong>Spoleczność</strong></a></li>
			<li><a href="/grupy"><strong>Grupy</strong></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="/online">
<?php
//require_once 'panel/dbconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/panel/dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password, false);
mysqli_select_db($polaczenie, $database2);

$zapytanielonline = "SELECT * FROM user WHERE online=1";
$rezultatlonline = mysqli_query($polaczenie, $zapytanielonline);
$rowlonline = mysqli_fetch_assoc($rezultatlonline);
$lonline = mysqli_num_rows($rezultatlonline);
echo<<<END
Aktualnie online TS: $lonline
END;
?>
</a></li>
<!--			<li>

			<a>
			<div id="logowanie" class="pull-right nav signin-dd">
				
					<a id="quick_sign_in" data-toggle="dropdown" aria-expanded="false">
					<span class="hidden-xs">
					Zaloguj się					</span></a>
					<div class="dropdown-menu" role="menu" aria-labelledby="quick_sign_in" style="padding: 10px 10px;  min-width: 300px; min-height: 50px;">
					
																						<div style="width: 250px;">
							<h4 class="text-center">Wejdź na nasz serwer, aby móc się zalogować</h4>
							<a data-toggle="tooltip" title="" href="ts3server://iPerion.pl" class="btn-twitter fullwidth radius3" data-original-title="Kliknij tutaj, aby połączyć się z serwerem"><i class="fa fa-bolt"></i> Połącz z iPerion.pl</a>
							</div>
														<hr>
							
							
						
													<p class="bottom-create-account formularze" id="przelacz_uzytkownika" style="display: none;">
								<a href="#" onclick="event.preventDefault();">Wybierz innego użytkownika</a>
							</p>
												
												
											</div>
				</div>
			
			
			</a>
			</li> -->
			</ul>
				</div>
			</div>
		</nav>