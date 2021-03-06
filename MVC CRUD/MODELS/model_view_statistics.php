<?php
//============================
//Start/join a session
//this must come BEFORE the <HTML> tag
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION['loggedin'])){$_SESSION['loggedin']=0;}
if(!isset($_SESSION['loginAttempts'])){$_SESSION['loginAttempts']=0;}
if(!isset($_SESSION['views'])){$_SESSION['views']=0;}
if(!isset($_SESSION['deck_id'])){$_SESSION['deck_id']='VALID ID NOT SELECTED';}

//initialise variables
$table='cards';  //table to insert values into
$msg='';  //this is an empty message initially , it will contain the result of the insertion
$UserID = $_SESSION['ID'];
$SelectedID = $_POST['cardID'];


//Construct Query strings
$sqlData= "SELECT card_name, parent_type, card_type, sub_type, level, attribute, attack, defence, description FROM $table WHERE card_id = $SelectedID";



$sqlTitles = "SELECT column_name as Field
from `information_schema`.`columns` 
where `table_schema` = 'k00223356_duelnetwork' and `table_name` in ('cards')
and `column_name` in ('card_name', 'parent_type', 'card_type', 'sub_type', 'level', 'attribute', 'attack', 'defence', 'description')";


//execute the 2 queries
$rsData=getTableData($conn,$sqlData);
$rsTitles=getTableData($conn,$sqlTitles);

//check the results 
$arrayData=checkResultSet($rsData);
$arrayTitles=checkResultSet($rsTitles);	

		
//close the connection
$conn->close();



//prepare view template values
$tab='L05';
$pageHeading='Your Decks';


if ($_SESSION['loggedin']==1){//NEED THIS
	//nav section content - logged in user
	$contentStringNAV='';
	$contentStringNAV.='<h3>NAV SECTION</h3>';
    $contentStringNAV.='<form method="post">';
    $contentStringNAV.='<a href="controller_login_manager.php">HOME</a></br>';
	$contentStringNAV.= '<a href="http://www.wikihow.com/Play-Yu-Gi-Oh!">THE RULE BOOK</a><br>';
	$contentStringNAV.= '<a href="controller_add_decks.php">ADD DECKS</a><br>';
	$contentStringNAV.= '<a href="controller_delete_view_playdeck.php">MY DECKS</a><br>';
	$contentStringNAV.='</form>';
	

	if ($_SESSION['authorizationlevel'] == 1) {
		$contentStringNAV='';
		$contentStringNAV.='<h3>NAV SECTION</h3>';
		$contentStringNAV.='<form method="post">';
		$contentStringNAV.='<a href="controller_login_manager.php">HOME</a></br>';
		$contentStringNAV.= '<a href="http://www.wikihow.com/Play-Yu-Gi-Oh!">THE RULE BOOK</a><br>';
		$contentStringNAV.= '<a href="controller_add_decks.php">ADD DECKS</a><br>';
		$contentStringNAV.= '<a href="controller_delete_view_playdeck.php">MY DECKS</a><br>';
		$contentStringNAV.= '<br>';
		$contentStringNAV.= '<a href="controller_delete_and_edit_user.php">ACCOUNTS</a><br>';
		$contentStringNAV.= '<a href="controller_addcards.php">ADD CARD</a><br>';
		$contentStringNAV.= '<a href="controller_delete_and_edit_card.php">EDIT CARDS</a><br>';
		$contentStringNAV.='<form method="post">';
		$contentStringNAV.='</form>';
	}

}

//main section content:
$contentStringMAIN='';
//$contentStringMAIN.='Your authority level is '.$_SESSION['authorizationlevel'];
//$contentStringMAIN.=' Your ID is '.$_SESSION['ID'];


//RHS section content
$contentStringRHS='';

//footer section content
$contentStringFOOTER='';


if (__DEBUG==1) //construct the footer with debug information 
	{	
		$contentStringFOOTER.= '<footer class="debug">';

		$contentStringFOOTER.=  '<h3>***DEBUG INFORMATION***</h3>';
		
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


















 



