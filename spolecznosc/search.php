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
						<h3 class="page-header"><i class="fa fa-id-card-o" aria-hidden="true"></i> Znalezieni <strong>Użytkownicy</strong></h3>
						<div class="panel panel-group bg-light" style="box-shadow:10px 10px 20px -2px rgba(0,0,0,0.73);">
							<div class="panel  panel-default">
								<div class="panel-heading bg-black font-white">
									<h4>Wyniki</h4>
								</div>
								<div class="panel-body bg-middle">
									<table class="table table-condensed" style="margin-bottom: -14px;">
										<tbody>

<?php
mysql_connect("localhost", "ts3", "bazats123", false) or die("Error connecting to database: ".mysql_error());
	/*
		localhost - it's location of the mysql server, usually localhost
		root - your username
		third is your password
		
		if connection fails it will stop loading the page and display an error
	*/
	
	mysql_select_db("ts3") or die(mysql_error());
	/* tutorial_search is the name of database we've created */

	$query = $_GET['query']; 
	// gets value sent over search form
	
	$min_length = 1;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		$query = mysql_real_escape_string($query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysql_query("SELECT * FROM clients
			WHERE (`client_nickname` LIKE '%".$query."%') OR (`client_id` LIKE '%".$query."%')") or die(mysql_error());
			
		// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// articles is the name of our table
		
		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		
		if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysql_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
				
				echo "<tr><td><h2 style='margin-top: -1px;' data-toggle='tooltip-arrow' data-placement='top' title='".$results['client_id']."'><a href='http://iperion.pl/panel/?id=".$results['client_id']."' style='text-decoration : none; color : #ffffff;' ><span class='label label-default'><strong>".$results['client_nickname']."</strong></span></a></h2></td></tr>";
				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}
			
		}
		else{ // if there is no matching rows do following
			echo "Brak wyników";
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimalna ileść znaków to ".$min_length;
	}
?>
												</tbody>
												</table>
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