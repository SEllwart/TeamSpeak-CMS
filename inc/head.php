<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';
$title = $config['strona']['nazwa'];
$icon = $config['strona']['ico'];
echo<<<END
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>$title</title>
	<link rel="icon" href="$icon">
END;
?>
    <!-- Bootstrap -->
    <link href="/inc/css/bootstrap.min.css" rel="stylesheet" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/inc/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&subset=latin,latin-ext" rel="stylesheet" type="text/css" />
	<!-- Włączenie main.css -->
	<link href="/inc/css/main.css" rel="stylesheet" />
	<!-- Ikonki -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){

        $(".baner").animate({left: '60%'});

});
</script> 
	