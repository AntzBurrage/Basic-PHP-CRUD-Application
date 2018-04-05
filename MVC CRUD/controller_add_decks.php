<html>
<head>
<title>Yu-gi-oh Deck Network</title>
</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//initialise session variable used by the controller
if(!isset($_SESSION['loggedin'])){$_SESSION['loggedin']=0;}
if(!isset($_SESSION['loginAttempts'])){$_SESSION['loginAttempts']=0;}
if(!isset($_SESSION['views'])){$_SESSION['views']=0;}
if(!isset($_SESSION['deck_id'])){$_SESSION['deck_id']='VALID ID NOT SELECTED';}
//includes
include("CONFIG/connection.php");  //include the database connection 
include("CONFIG/config.php");  //include the application configuration settings

//variables
$tab="L03";

//views
if(isset($_POST['add_deck'])){			
			//process the registration data
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_add_decks_result.php");  
			include("VIEWS/view_add_decks_result.php");
			
		}
else{
			include("MODELS/model_add_decks.php");
			include("VIEWS/view_add_decks.php");
}
?>