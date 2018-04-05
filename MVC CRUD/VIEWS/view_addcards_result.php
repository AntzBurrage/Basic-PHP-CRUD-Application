<META HTTP-EQUIV="Content-Type" CONTENT="text/html;" charset="UTF-8">
<html>
<head>
<title><?php echo $tab; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo __CSS;?>">
<meta http-equiv="refresh" content="5; controller_addcards.php">
</head>
<body>
<!----------------- HEADER SECTION ----------------------->
<!-------------------------------------------------------->
<header>
<h2><?php echo $pageHeading; ?></h2>
</header>

<!----------------NAVIGATION SECTION---------------------->
<!-------------------------------------------------------->

<nav>
<?php echo $contentStringNAV;?>
</nav>


<!----------------MAIN SECTION---------------------------->
<!-------------------------------------------------------->
<section>
<?php 
	echo $contentStringMAIN;
	  //$last= $connection->lastInsertId();
	 //echo '<img src="model_addcards_result.php?id='. $last. '>'
 ?>


</section>


<!----------------RHS SECTION----------------------------->
<!-------------------------------------------------------->
<!--<section class="right">
<?php //echo $contentStringRHS; ?>
</section> -->



<!----------------FOOTER section-------------------------->
<!-------------------------------------------------------->
<?php echo $contentStringFOOTER; ?>
</body>
</html>
















 



