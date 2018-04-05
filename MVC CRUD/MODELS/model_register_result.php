<?php

$table='users';  //table to insert values into
	
//INSERT QUERY
//get the values entered in the form
$User_name=$conn->real_escape_string($_POST['user_name']);
$First_name=$conn->real_escape_string($_POST['first_name']);
$Last_name=$conn->real_escape_string($_POST['last_name']);
$Email_=$conn->real_escape_string($_POST['email']);
$pass1=$_POST['Pass1'];
$pass2=$_POST['Pass2'];		

$msg='';  //this is an empty message initially , it will contain the result of the insertion
	
if ($pass1===$pass2)
	{
		
		$passEncrypt= hash('ripemd160', $pass1);  //this algorithm requires 40 chars field length
		
		//construct the SQL
		$sqlInsert= "INSERT INTO $table (user_name,email,first_name,last_name,password, authorization_level) VALUES('$User_name','$Email_','$First_name','$Last_name','$passEncrypt', '2')";

		
		if(query($conn,$sqlInsert)==1) //execute the INSERT query
		{ 
		$msg.= "<h3>New data inserted successfully</h3>";
		
		}
		else
		{
		$msg.=  "<h3>New data has not been inserted - a record for this ID already exists</h3>";
		}
		
	}
	else
	{ 
		$msg.= "<h3>Passwords don't match - data not entered</h3>";
	}
				
			
//prepare the result of the insertion for display in a view

//Query string
//$sqlData="SELECT * FROM $table WHERE user_name='$User_name'";  //get the data from the table
//$sqlTitles="SHOW COLUMNS FROM $table";  //get the table column descriptions

//execute the 2 queries
//$rsData=getTableData($conn,$sqlData);
///$rsTitles=getTableData($conn,$sqlTitles);

//check the results 
//$arrayData=checkResultSet($rsData);
//$arrayTitles=checkResultSet($rsTitles);

//close the connection
$conn->close();


//-----------------------------------------------------
//prepare view template values
$tab='L03';
$pageHeading='You Are Now Registered, Welcome to DECK NETWORK';

//nav section content
$contentStringNAV='';
$contentStringNAV.='<h3>NAV SECTION</h3>';
$contentStringNAV.='<a href="controller_login_manager.php">HOME</a></br>';
$contentStringNAV.= '<a href="http://www.wikihow.com/Play-Yu-Gi-Oh!">THE RULE BOOK</a><br>';

//main section content:
$contentStringMAIN=$msg;


//RHS section content
$contentStringRHS='Welcome to DECK NETWORK!! Build and Save Your Very Own Decks, from Our Vast Database of Cards! Its Time to Duel';

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


















 



