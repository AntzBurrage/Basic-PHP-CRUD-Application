
<?php
$msg= '';
$password = '';
$root = 'root';
$connection = new PDO("mysql:host=localhost;dbname=k00223356_duelnetwork", $root, $password);


$Card_name= $_POST['cardname'];
$Card_ID = $_POST['cardID'];
$DECKS = $_POST['addcard'];

		try{
		$result = $connection->query("SELECT * FROM cards WHERE card_id=$Card_name");
		}catch(PDOException $e){
			$msg .= "<h3>Something happened</h3>";
		}

		$card = $result->fetchAll(PDO::FETCH_ASSOC);
		$card_text = $card[0]['card_name'];
		
		try {
		$connection->query("INSERT INTO deckcards (deck_id, card_id, card_name) 
	    VALUES ('$DECKS', '$Card_name', '$card_text')");
	    $msg.=  "<h3>New data inserted successfully</h3>";
		}
		catch (PDOException $e)
		{
		$msg.= "<h3>New data has not been inserted</h3>". $e;
		}


//-----------------------------------------------------
//prepare view template values
$tab='L03';
$pageHeading='The Card Has Been Added to Your Deck';

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
$contentStringMAIN=$msg;


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


















 



