<html>
<head>
<title>Yu-gi-oh Deck Network</title>
</head>
<body>
<?php
//============================
//Start/join a session
//this must come BEFORE the <HTML> tag
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//initialise session variable used by the controller
if(!isset($_SESSION['loggedin'])){$_SESSION['loggedin']=0;}
if(!isset($_SESSION['loginAttempts'])){$_SESSION['loginAttempts']=0;}
if(!isset($_SESSION['views'])){$_SESSION['views']=0;}
if(!isset($_SESSION['deck_id'])){$_SESSION['deck_id']='VALID ID NOT SELECTED';}


//includes
include_once("CONFIG/connection.php");  //include the database connection 
include_once("CONFIG/config.php");  //include the application configuration settings

//variables
$tab="L05";

//views
if(isset($_POST['btn_select_for_deletion'])){ //load the record delete controller		
			include('controller_delete_card_from_decks.php');
			}			
if(isset($_POST['viewcards'])){ //load the record edit controller
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_view_statistics.php");
			include("VIEWS/view_view_statistics.php");
			}		
else{//load the edit/delete form model and view
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_view_deckcards.php");
			include("VIEWS/view_view_deckcards.php");
}
?>