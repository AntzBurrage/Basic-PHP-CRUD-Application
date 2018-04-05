<?php

//initialise variables
$table='cards';  //table to delete values from
$msg='';  //this is an empty message initially
//$_SESSION['validID']=FALSE; //reset to FALSE 
	
//get the values entered in the form
$cardID=$conn->real_escape_string($_POST['cardID']);
$_SESSION['card_id']=$cardID;

//Construct Query strings
$sqlData= "SELECT * FROM $table WHERE card_id='$cardID'";
$sqlTitles = "SELECT column_name as Field
from `information_schema`.`columns` 
where `table_schema` = 'k00223356_duelnetwork' and `table_name` in ('cards')
and `column_name` in ('card_name', 'parent_type', 'level', 'attack', 'defence')";  //get the table column descriptions

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
$pageHeading='Delete Card Record';

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

if($rsData->num_rows==1){//check ONE valid record selected
	$contentStringMAIN='<h3>Confirm this record for DELETION</h3>';
	$_SESSION['validID']=TRUE;
}
else{
	$contentStringMAIN='<h3>The selected record does not exist. </h3>Please select a valid ID.';
	$_SESSION['validID']=FALSE;
}

//RHS section content
$contentStringRHS='This page displays the status of the delete record process.';

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


















 



