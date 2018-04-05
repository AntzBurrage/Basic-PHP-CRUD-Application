<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['loggedin'])){$_SESSION['loggedin']=0;}
if(!isset($_SESSION['loginAttempts'])){$_SESSION['loginAttempts']=0;}
if(!isset($_SESSION['views'])){$_SESSION['views']=0;}
if(!isset($_SESSION['deck_id'])){$_SESSION['deck_id']='VALID ID NOT SELECTED';}

//initialise variables
$table='decks';  //table to insert values into
$msg='';  //this is an empty message initially , it will contain the result of the insertion

	
//get the values entered in the form
$deckID=$_SESSION['deck_id'];

//Construct Query strings
//$sqlDelete= "DELETE FROM $table WHERE deck_id ='$deckID'";
$sqlDelete= "CALL delete_from_decks('".$deckID."')";


if(query($conn,$sqlDelete)==1){
	$msg='Record successfully deleted';
}
else{
		$msg='Unable to delete record';
}

			
//close the connection
$conn->close();


//-----------------------------------------------------
//prepare view template values
$tab='L05';
$pageHeading='Delete Deck';

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
		$contentStringFOOTER.=  $sqlDelete;	


		
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


















 



