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
if(!isset($_SESSION['user_id'])){$_SESSION['user_id']='VALID ID NOT SELECTED';}



//includes
include_once("CONFIG/connection.php");  //include the database connection 
include_once("CONFIG/config.php");  //include the application configuration settings

//variables
$tab="L05";

//views
if(isset($_POST['btn_edit'])){
				
			//process the form data
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsForms.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_edit_select_user.php");
			include("VIEWS/view_edit_select_user.php");
			}
			
elseif(isset($_POST['btn_save'])){
			//process the form data
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_edit_save_user.php");
			include("VIEWS/view_edit_save_user.php");


}
else{
			include("controller_delete_and_edit_user.php");

}
?>