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
			include('controller_delete_deck.php');
			}			
if(isset($_POST['view'])){ //load the record edit controller
			include("controller_view_deckcards.php");
			}
if(isset($_POST['add'])){ //load the record edit controller
			//include("controller_addcardstodeck.php");
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_delete_view_playdeck_2.php");
			include("VIEWS/view_delete_view_playdeck_2.php");
			}	
if(isset($_POST['addcard'])){ 
			//var_dump($_POST['cardname']);
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_addcardstodeck_result.php");
			include("VIEWS/view_addcardstodeck_result.php");

}

if(isset($_POST['play'])){ //load the record edit controller
			include("");
			}		
else{//load the edit/delete form model and view
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_delete_view_playdeck.php");
			include("VIEWS/view_delete_view_playdeck.php");
}
?>