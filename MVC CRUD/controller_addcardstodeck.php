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



//print_r($DECKS);

//views
if(isset($_POST['addcard'])){			
			//process the registration data
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_addcardstodeck_result.php");  
			include("VIEWS/view_addcardstodeck_result.php");
			
		}
else{
			include("LIBRARY/helperFunctionsDatabase.php");
			include("LIBRARY/helperFunctionsTables.php");
			include("MODELS/model_addcardstodeck.php");
			include("VIEWS/view_addcardstodeck.php");

			/*
			$sql= "SELECT deck_id FROM k00223356_duelnetwork.decks where deck_id = $DECKS "; //password is encrypted 

			//execute the query
			$rs=$conn->query($sql);  //execute the query
	
		    //check the login credentials
		    if($rs->num_rows == 1) //process the login credentials
		    {  
			$rs->data_seek(0);  //point to the current row
			$row = $rs->fetch_assoc();  //get the data in the row

			$_SESSION['deck_id']=$row['deck_id']; */
		//}
	}
?>