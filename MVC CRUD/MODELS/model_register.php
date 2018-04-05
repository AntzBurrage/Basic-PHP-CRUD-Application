<?php
//prepare view template values
$tab='L03';
$pageHeading='Welcome to Yu-Gi-Oh DECK NETWORK!! Feel free to Register Here';

//nav section content
$contentStringNAV='';
$contentStringNAV.='<h3>NAV SECTION</h3>';
$contentStringNAV.='<a href="controller_login_manager.php">HOME</a></br>';
$contentStringNAV.= '<a href="http://www.wikihow.com/Play-Yu-Gi-Oh!">THE RULE BOOK</a><br>';

//main section content:
$contentStringMAIN='';

//RHS section content
$contentStringRHS='Welcome to Yu-Gi-Oh DECK NETWORK!! Build and Save Your Very Own Decks, from Our Vast Database of Cards! Its Time to Duel';

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


















 



