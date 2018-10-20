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
						<h3 class="page-header"><i class="fa fa-id-card-o" aria-hidden="true"></i> Wyszukaj <strong>Użytkownika</strong></h3>
						<div class="panel panel-group bg-light" style="box-shadow:10px 10px 20px -2px rgba(0,0,0,0.73);">
							<div class="panel  panel-default">
								<div class="panel-heading bg-black font-white">
									
								</div>
								<div class="panel-body bg-middle">
								
									<form action="search.php" method="GET">
										<input type="text" name="query" aria-describedby="passwordHelpBlock" class="form-control form-control-lg" placeholder="Zacznij wpisywać!" />
										
										<p id="passwordHelpBlock" class="form-text text-muted"> Możesz wyszukiwać za pomocą Nicku lub ID użytkownika. Jeżeli nie znasz pełnej nazwy wpisz jej część!</p>
										
										<input type="submit" value="Szukaj" class="btn btn-primary" />
									</form>
								</div>
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