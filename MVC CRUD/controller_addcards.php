<html>
<head>
<title>Yu-gi-oh Deck Network</title>
</head>
<body>
<?php
//includes
//include("CONFIG/connection.php");  //include the database connection 
include("CONFIG/config.php");  //include the application configuration settings

//variables
$tab="L03";

//views
if(isset($_POST['add_card'])){			
			//process the registration data
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_addcards_result.php");  
			include("VIEWS/view_addcards_result.php");
			
		}
else{
			include("MODELS/model_addcards.php");
			include("VIEWS/view_addcards.php");
}
?>