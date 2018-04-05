
<?php

$table='decks';  //table to insert values into
	
$password = '';
$root = 'root';
$connection = new PDO("mysql:host=localhost;dbname=k00223356_duelnetwork", $root, $password);

$Deck_name=$_POST['deck_name'];
$userID = $_SESSION['ID'];
$msg='';

		try {
		$connection->query("INSERT INTO $table (deck_name, user_id) VALUES ('$Deck_name','$userID')");
	    $msg.=  "<h3>New data inserted successfully</h3>";
		}
		catch (PDOException $e)
		{
		$msg.= "<h3>New data has not been inserted</h3>". $e;
		}



//-----------------------------------------------------
//prepare view template values
$tab='L03';
$pageHeading='The Card is now Registered';

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
$contentStringMAIN=$msg;
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
		
		$contentStringFOOTER.=  '<h4>SQL</h4>';
		$contentStringFOOTER.=  $sql;

		
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


















 



