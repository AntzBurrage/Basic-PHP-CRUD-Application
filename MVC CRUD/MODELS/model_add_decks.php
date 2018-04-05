<?php
//prepare view template values
$tab='L03';
$pageHeading='Welcome to Yu-Gi-Oh DECK NETWORK!! (Admin Page)';



//nav section content
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
		
		
		$contentStringFOOTER.=  "</footer>";
	}
else{ //construct the standard footer
	$contentStringFOOTER.='<footer class="copyright">';
	$contentStringFOOTER.= 'Copyright 2017 Anthony Burrage';
	$contentStringFOOTER.= "</footer>";
}


?>


















 



