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
if(!isset($_SESSION['deck_id'])){$_SESSION['deck_id']='VALID ID NOT SELECTED';}


//includes
include_once("CONFIG/connection.php");  //include the database connection 
include_once("CONFIG/config.php");  //include the application configuration settings

//variables
$tab="L05";

//views
if(isset($_POST['btn_select_for_deletion'])){	
			//process the form data
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsForms.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_delete_confirm_deck.php");
			include("VIEWS/view_delete_confirm_deck.php");
			}
			
elseif(isset($_POST['btn_confirm_delete'])){
			//process the form data
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_delete_commit_deck.php");
			include("VIEWS/view_delete_commit_deck.php");
			echo 'OK';

}
//else{
//			include("controller_delete_view_playdeck.php");
//}
?>