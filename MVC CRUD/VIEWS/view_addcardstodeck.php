<META HTTP-EQUIV="Content-Type" CONTENT="text/html;" charset="UTF-8">
<html>
<head>
<title><?php echo $tab; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo __CSS;?>">

<!--jQuery Library-->
<script src=
"http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
</script>
		
	


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
	//echo $DECKS;
	generatedropdownmenu($arrayData, $DECKS);



	//include 'FORMS/newcardtodeckentry.html'; 
 ?>


</section>


<!----------------RHS SECTION----------------------------->
<!-------------------------------------------------------->

<!-<section class="right">

<?php //echo $contentStringRHS; ?>

<!-</section>



<!----------------FOOTER section-------------------------->
<!-------------------------------------------------------->
<?php echo $contentStringFOOTER; ?>
</body>
</html>
















 



