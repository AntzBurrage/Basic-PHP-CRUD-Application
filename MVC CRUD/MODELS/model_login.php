<?php
//this model:
//-gets the user and shortlife cookie values
//-puts them into a string for display in the view

//initialise session variables
if(!isset($_SESSION['loggedin'])){$_SESSION['loggedin']=0;}
if(!isset($_SESSION['loginAttempts'])){$_SESSION['loginAttempts']=0;}
if(!isset($_SESSION['views'])){$_SESSION['views']=0;}

//template values
$title='LOGIN';
$pageHeading='Welcome to Yu-Gi-Oh DECK NETWORK';

if ($_SESSION['loggedin']==1){//NEED THIS
	//nav section content - logged in user
	$contentStringNAV='';
	$contentStringNAV.='<h3>NAV SECTION</h3>';
    $contentStringNAV.='<form method="post">';
    $contentStringNAV.='<a href="controller_login_manager.php">HOME</a></br>';
	$contentStringNAV.= '<a href="http://www.wikihow.com/Play-Yu-Gi-Oh!">THE RULE BOOK</a><br>';
	$contentStringNAV.= '<a href="controller_add_decks.php">ADD DECKS</a><br>';
	$contentStringNAV.= '<a href="controller_delete_view_playdeck.php">MY DECKS</a><br>';
	$contentStringNAV.= '<input style="width: 100px; height: 25px; margin-top:5px;" name="logout" type="submit" id="logout" value="Log Out">';
	$contentStringNAV.='</form>';
	

	if ($_SESSION['authorizationlevel'] == 1) {
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
		$contentStringNAV.='<form method="post">';
		$contentStringNAV.= '<input style="width: 100px; height: 25px; margin-top:5px;" name="logout" type="submit" id="logout" value="Log Out">';
		$contentStringNAV.='</form>';
	}

}
else{
	//nav section content - not logged in
	$contentStringNAV='';
	$contentStringNAV.='<h3>NAV SECTION</h3>';
	$contentStringNAV.='<a href="controller_register.php">REGISTER</a></br>';
	$contentStringNAV.= '<a href="http://www.wikihow.com/Play-Yu-Gi-Oh!">THE RULE BOOK</a><br>';
}

//main section content:
$contentStringMAIN=''; 
if ($_SESSION['loggedin']==1){
	//main section content - logged in user
	//$contentStringMAIN.='<h2>Home Page of '.$_SESSION['firstName'].' '.$_SESSION['lastName'].'</h2>';
	$contentStringMAIN.='<p>Welcome '.$_SESSION['firstName'].' to your PRIVATE home page.';


	// use this only for the purposes of debugging! 
	//$contentStringMAIN.='Your authority level is '.$_SESSION['authorizationlevel'];
	//$contentStringMAIN.=' Your ID is '.$_SESSION['ID'];
	

//logout form
	$contentStringMAIN.='';

}
else{
	//main section content - user not logged in
	$contentStringMAIN.='<form class="login" method="post" action="controller_login_manager.php">';
	$contentStringMAIN.='	<div>';
	$contentStringMAIN.='		<h2>Login Form</h2>';
	$contentStringMAIN.='		<table class="form">';
	
	$contentStringMAIN.='		<label>';
	$contentStringMAIN.='		<span>User Name</span><input name="User_name" type="text" >';
	$contentStringMAIN.='		<span>Password</span><input name="Password" type="password" >';
	$contentStringMAIN.='		</label>';
	
	$contentStringMAIN.='		<label>';
	$contentStringMAIN.='		<span>Lets Play</span><input name="login" type="submit" id="login" value="Login">';
	$contentStringMAIN.='		<span>Or Lets Register</span><input name="register" type="submit" id="register"
								value="Register">';
	$contentStringMAIN.='		</label>';

	$contentStringMAIN.='		</table>';
	$contentStringMAIN.='	</div>';
	$contentStringMAIN.='</form>';
}



//RHS section content
$contentStringRHS='';
$contentStringRHS.='<h4>Login/Session Status</h4>';
if ($_SESSION['loggedin']==1){
	$contentStringRHS.='</br>You are logged in';
	$contentStringRHS.='</br>Nr. of Page Views='.$_SESSION['views'];
}
else{
	$contentStringRHS.='</br>You are not logged in';
	$contentStringRHS.='</br>Nr. of login attempts='.$_SESSION['loginAttempts'];
	$contentStringRHS.='</br>Nr. of Page Views='.$_SESSION['views'];
}


//footer section content
$contentStringFOOTER='';
if (__DEBUG==1) //construct the footer with debug information 
	{	
		$contentStringFOOTER.= '<footer class="debug">';

		$contentStringFOOTER.=  '<h3>***DEBUG INFORMATION***</h3>';
		
		$contentStringFOOTER.=  '<h4>$_COOKIE Array</h4>';
		foreach($_COOKIE as $key=>$value){
			$contentStringFOOTER.=  '$_COOKIE[\''.$key."'] = ".$value.'</br>';
		}
		
		$contentStringFOOTER.=  '<h4>$_SESSION Array</h4>';
		foreach($_SESSION as $key=>$value){
			$contentStringFOOTER.=  '$_SESSION[\''.$key."'] = ".$value.'</br>';
		}		

		$contentStringFOOTER.=  '<h4>$_POST Array</h4>';
		foreach($_POST as $key=>$value){
			$contentStringFOOTER.=  '$_POST[\''.$key."'] = ".$value.'</br>';
		}
		
		if(isset($sql)){
			$contentStringFOOTER.=  '<h4>SQL QUERY</h4>';
			$contentStringFOOTER.= $sql;
		}
		

		
		$contentStringFOOTER.=  "</footer>";
	}
else{ //construct the standard footer
	$contentStringFOOTER.='<footer class="copyright">';
	$contentStringFOOTER.= 'Copyright 2017 Anthony Burrage';
	$contentStringFOOTER.= "</footer>";
}



?>


</body>
</html>
















 



