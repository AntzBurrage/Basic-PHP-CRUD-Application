<META HTTP-EQUIV="Content-Type" CONTENT="text/html;" charset="UTF-8">
<html>
<head>
<title><?php echo $tab; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo __CSS;?>">
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
	//if a valid ID has been entered - generate the edit record form
	if($_SESSION['validID']){generateUserEditForm($_SESSION['user_id'], $_SESSION['userName'], $_SESSION['firstName'],$_SESSION['lastName'],$_SESSION['auth'],'controller_edit_user.php');} 
 ?>


</section>


<!----------------RHS SECTION----------------------------->
<!-------------------------------------------------------->
<!--<section class="right">
<?php //echo $contentStringRHS; ?>
</section>



<!----------------FOOTER section-------------------------->
<!-------------------------------------------------------->
<?php echo $contentStringFOOTER; ?>
</body>
</html>
















 



