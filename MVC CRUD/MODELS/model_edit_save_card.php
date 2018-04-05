<?php
//============================
//Start/join a session
//this must come BEFORE the <HTML> tag
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//initialise variables
$table='cards';  //table to insert values into
$msg='';  //this is an empty message initially , it will contain the result of the insertion

//get the currently selected ID from the $_SESSION array
$cardID=$_SESSION['card_id'];

	
//get the values entered in the edit record form
$CardName=$conn->real_escape_string($_POST['EditCardName']);
$Des=$conn->real_escape_string($_POST['EditDes']);



$sqlUpdate="UPDATE $table SET card_name='$CardName', description='$Des' WHERE card_id='$cardID'";


//execute and check the insert query
if(query($conn,$sqlUpdate)==1){
	//insert query is successful
	$msg='Edit record has succeeded';
	$_SESSION['successfulEdit']=TRUE;
}
else{
	//query has failed
	$msg='Edit record has FAILED';
	$_SESSION['successfulEdit']=FALSE;
}

//select the edited record

//Construct Query strings
//$sqlData= "SELECT card_id, card_name, description FROM $table WHERE card_id='$cardID'";
$sqlData= "SELECT * FROM $table WHERE card_id='$cardID'";
//$sqlTitles="SHOW COLUMNS FROM $table";  //get the table column descriptions
$sqlTitles = "SELECT column_name as Field
from `information_schema`.`columns` 
where `table_schema` = 'k00223356_duelnetwork' and `table_name` in ('cards')
and `column_name` in ('card_id', 'card_name', 'description')";
//execute the 2 queries
$rsData=getTableData($conn,$sqlData);
$rsTitles=getTableData($conn,$sqlTitles);

//check the results 
$arrayData=checkResultSet($rsData);
$arrayTitles=checkResultSet($rsTitles);	
			
//close the connection
$conn->close();


//-----------------------------------------------------
//prepare view template values
$tab='L05';
$pageHeading='Edit Card Details';

//nav section content
$contentStringNAV='';
$contentStringNAV.='<h3>NAV SECTION</h3>';
		$contentStringNAV.='<a href="controller_login_manager.php">HOME</a></br>';
		$contentStringNAV.= '<a href="http://www.wikihow.com/Play-Yu-Gi-Oh!">THE RULE BOOK</a><br>';
		$contentStringNAV.= '<a href="controller_add_decks.php">ADD DECKS</a><br>';
		$contentStringNAV.= '<a href="controller_delete_view_playdeck.php">MY DECKS</a><br>';
		$contentStringNAV.= '<br>';
		$contentStringNAV.= '<a href="controller_delete_and_edit_user.php">ACCOUNTS</a><br>';
		$contentStringNAV.= '<a href="controller_addcards.php">ADD CARD</a><br>';
		$contentStringNAV.= '<a href="controller_delete_and_edit_card.php">EDIT CARDS</a><br>';

//main section content:
$contentStringMAIN='<h3>'.$msg.'</h3>';

//RHS section content
$contentStringRHS='';

//footer section content
$contentStringFOOTER='';

if (__DEBUG==1) //construct the footer with debug information 
	{	
		$contentStringFOOTER.= '<footer class="debug">';

		$contentStringFOOTER.=  '<h3>***DEBUG INFORMATION***</h3>';
		
		$contentStringFOOTER.=  '<h4>SQL</h4>';
		$contentStringFOOTER.=  $sqlData;	


		
		$contentStringFOOTER.=  '<h4>$_POST Array</h4>';
		foreach($_POST as $key=>$value){
			$contentStringFOOTER.=  '$_POST[\''.$key."'] = ".$value.'</br>';
		}
		
		$contentStringFOOTER.=  '<h4>$_SESSION Array</h4>';
		foreach($_SESSION as $key=>$value){
			$contentStringFOOTER.=  '$_SESSION[\''.$key."'] = ".$value.'</br>';
		}
		
		
		$contentStringFOOTER.=  "</footer>";
	}
else{ //construct the standard footer
	$contentStringFOOTER.='<footer class="copyright">';
	$contentStringFOOTER.= 'Copyright 2017 Anthony Burrage';
	$contentStringFOOTER.= "</footer>";
}


?>


















 



