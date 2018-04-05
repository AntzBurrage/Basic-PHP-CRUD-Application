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
if(!isset($_SESSION['user_id'])){$_SESSION['user_id']='VALID ID NOT SELECTED';}//should this be ID??


//includes
include_once("CONFIG/connection.php");  //include the database connection 
include_once("CONFIG/config.php");  //include the application configuration settings

//variables
$tab="L05";

//views
if(isset($_POST['btn_select_for_deletion'])){ //load the record delete controller		
			include('controller_delete_user.php');
			}			
elseif(isset($_POST['btn_edit'])){ //load the record edit controller
			include("controller_edit_user.php");
			}			
else{//load the edit/delete form model and view
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_delete_and_edit_user.php");
			include("VIEWS/view_delete_and_edit_user.php");
}
?>