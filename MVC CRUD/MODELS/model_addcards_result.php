
<?php

$table='cards';  //table to insert values into
	
$password = '';
$root = 'root';
$connection = new PDO("mysql:host=localhost;dbname=k00223356_duelnetwork", $root, $password);

$Card_name=$_POST['card_name'];
$Parent_type=$_POST['parent_type'];
$Card_type=$_POST['card_type'];
$Sub_type=$_POST['sub_type'];
$Level=$_POST['level'];
$Attribute= $_POST['attribute'];
$Attack= $_POST['attack'];
$Defence=$_POST['defence'];
$Description=$_POST['description'];
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
$imagesize= getimagesize($_FILES['image']['tmp_name']);
$msg='';

if ($imagesize==FALSE) {
	echo "Tis not an image";
}

else 
{
		try {
		$connection->query("INSERT INTO $table (card_name, parent_type, card_type, sub_type, level, attribute, attack, defence, image, description) VALUES ('$Card_name','$Parent_type','$Card_type','$Sub_type','$Level','$Attribute','$Attack','$Defence','$image','$Description')");
	    $msg.=  "<h3>New data inserted successfully</h3>";
		}
		catch (PDOException $e)
		{
		$msg.= "<h3>New data has not been inserted</h3>". $e;
		}
}

//$last= $connection->lastInsertId();

//$image= $connection->query("SELECT image FROM cards WHERE card_id = $last");
//$image1= $image->fetch(PDO::FETCH_ASSOC);
//$image2 = $image1['image'];

//header("content-type: image/png");

//echo $image2;

//$connection = null;


///exit();




//-----------------------------------------------------
//prepare view template values
$tab='L03';
$pageHeading='The Card is now Registered';

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


















 



