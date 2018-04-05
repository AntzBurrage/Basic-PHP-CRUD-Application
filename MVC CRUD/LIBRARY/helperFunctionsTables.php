<?php
//helper functions

function getTableData($connection,$sql)
{
	try {
		$rs=$connection->query($sql);
		return $rs;
	}
	//catch exception
	catch(Exception $e) {
		if (__DEBUG==1) 
			{
			//DEBUG mode is enabled
			echo '<hr><h2>helperFunctionsTables.php  - getTableDataDebug Information:</h2>';
			echo '<h4>Error message $e:</h4>';
			echo 'Message: ' .$e->getMessage();
			//echo '<h4>Post Array:</h4>';
			//print_r($_POST);
			//echo '<h4>SQL:</h4>';
			//echo '$sql string:'.$sql'<br>';
			exit('<p class="warning">PHP script terminated');		
			}
		else
			{
			//DEBUG mode is disabled
			header("Location:".__USER_ERROR_PAGE);
			}
	}
}

function checkResultSet($rs)
	{
	if($rs === false) {
		if (__DEBUG==1)
		{
			//DEBUG mode is enabled
			echo '<hr><h2>helperFunctionsTables.php  - getTableDataDbug Information:</h2>';
			echo '<h4>Error message: ResultSet is Empty - check table name</h4>';
			exit('<p class="warning">PHP script terminated');		
		}
		else
		{	
			header("Location:".__USER_ERROR_PAGE);
		}
	} else {
		
                while ($row = $rs->fetch_assoc()) {
                  $arr[] = $row; //put the result into an array
                  }               
                
		return $arr;
	}
}

function generateTable($tableName, $titlesResultSet, $dataResultSet)
{
	//use resultsets to generate HTML tables

	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." TABLE - QUERY RESULT</caption>";
	echo '<tr>';
	foreach($titlesResultSet as $fieldName) {
		echo '<th>'.$fieldName['Field'].'</th>';
	}
	echo '</tr>';

	//then show the data
	foreach($dataResultSet as $row) {
		echo '<tr>';
		foreach($titlesResultSet as $fieldName) {
			echo '<td>'.$row[$fieldName['Field']].'</td>';}
		echo '</tr>';
		}
	echo "</table>";
}

function generateDeleteUserTable($tableName, $titlesResultSet, $dataResultSet)
{
	
	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." TABLE - QUERY RESULT</caption>";
	echo '<tr>';
	foreach($titlesResultSet as $fieldName) {
		echo '<th>'.$fieldName['Field'].'</th>';
	}
	echo '</tr>';

	//then show the data
	foreach($dataResultSet as $row) {
		echo '<tr>';
		foreach($titlesResultSet as $fieldName) {
			echo '<td>'.$row[$fieldName['Field']].'</td>';}
		echo '</tr>';
		}
	echo "</table>";
}
function generateEditedUserTable($tableName, $titlesResultSet, $dataResultSet)
{
	
	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." TABLE - QUERY RESULT</caption>";
	echo '<tr>';
	foreach($titlesResultSet as $fieldName) {
		echo '<th>'.$fieldName['Field'].'</th>';
	}
	echo '</tr>';
	//echo '<th>ID</th><th>USER</th><th>FIRST_NAME</th><th>LAST_NAME</th><th>AUTH</th>';
	//echo '</tr>';

	//then show the data
	//foreach($dataResultSet as $row) {
	//	echo '<tr>';
	//	echo '<td>'.$row['user_id'].'</td>';
	//	echo '<td>'.$row['user_name'].'</td>';
	//	echo '<td>'.$row['first_name'].'</td>';
	//	echo '<td>'.$row['last_name'].'</td>';
	//	echo '<td>'.$row['authorization_level'].'</td>';
	foreach($dataResultSet as $row) {
		echo '<tr>';
		foreach($titlesResultSet as $fieldName) {
			echo '<td>'.$row[$fieldName['Field']].'</td>';}
		echo '</tr>';
		}
	echo "</table>";
}


function generateEditDeleteUserTable($tableName, $pk, $titlesResultSet, $dataResultSet)
{

	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." - EDIT/DELETE TABLE</caption>";
	echo '<tr>';
	//foreach($titlesResultSet as $fieldName) {
	//	echo '<th>'.$fieldName['Field'].'</th>';
	//}
	echo '<th>USER</th><th>FIRST_NAME</th><th>LAST_NAME</th><th>AUTH</th><th>DELETE</th><th>EDIT</th>';
	echo '</tr>';

	//then generate the table of data with buttons for edit and delete
	foreach($dataResultSet as $row) {
		echo '<tr>';
		echo '<td>'.$row['user_name'].'</td>';
		echo '<td>'.$row['first_name'].'</td>';
		echo '<td>'.$row['last_name'].'</td>';
		echo '<td>'.$row['authorization_level'].'</td>';
		
		echo '<form class="small_button"  action="controller_delete_and_edit_user.php" method="post">';
		echo '<td><input class="smallBtn"  type="submit"  value="Delete" name="btn_select_for_deletion"></td>';
		echo '<td><input class="smallBtn"  type="submit"  value="Edit" name="btn_edit"></td>';
		echo '<input type="hidden" value="'.$row[$pk].'" name="userID">';//when the button is pressed the 
																				//$index 'hidden' value is inserted 
																				//into the $_POST array
		echo '</form>';

		echo '</tr>';
		}
	echo "</table>";
}

function generateDeleteCardTable($tableName, $titlesResultSet, $dataResultSet)
{
	
	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." TABLE - QUERY RESULT</caption>";
	echo '<tr>';
	foreach($titlesResultSet as $fieldName) {
		echo '<th>'.strtolower($fieldName['Field']).'</th>';
	}
	echo '</tr>';

	//then show the data
	foreach($dataResultSet as $row) {
		echo '<tr>';
		foreach($titlesResultSet as $fieldName) {
			echo '<td>'.$row[$fieldName['Field']].'</td>';}
		echo '</tr>';
		}
	echo "</table>";
}

function generateDeleteCardFromDeckTable($tableName, $titlesResultSet, $dataResultSet)
{
	
	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." TABLE - QUERY RESULT</caption>";
	echo '<tr>';
	foreach($titlesResultSet as $fieldName) {
		echo '<th>'.strtolower($fieldName['Field']).'</th>';
	}
	echo '</tr>';

	//then show the data
	foreach($dataResultSet as $row) {
		echo '<tr>';
		foreach($titlesResultSet as $fieldName) {
			echo '<td>'.$row[$fieldName['Field']].'</td>';}
		echo '</tr>';
		}
	echo "</table>";
}

function generateDeleteDeckTable($tableName, $titlesResultSet, $dataResultSet)
{
	
	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." TABLE - QUERY RESULT</caption>";
	echo '<tr>';
	foreach($titlesResultSet as $fieldName) {
		echo '<th>'.strtolower($fieldName['Field']).'</th>';
	}
	echo '</tr>';

	//then show the data
	foreach($dataResultSet as $row) {
		echo '<tr>';
		foreach($titlesResultSet as $fieldName) {
			echo '<td>'.$row[$fieldName['Field']].'</td>';}
		echo '</tr>';
		}
	echo "</table>";
}

function generateEditedCardTable($tableName, $titlesResultSet, $dataResultSet)
{
	
	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." TABLE - QUERY RESULT</caption>";
	echo '<tr>';
	foreach($titlesResultSet as $fieldName) {
		echo '<th>'.$fieldName['Field'].'</th>';
	}
	echo '</tr>';
	//echo '<th>ID</th><th>CARD</th><th>DESCRIPTION-EFFECT</th>';
	//echo '</tr>';

	//then show the data
	//foreach($dataResultSet as $row) {
	//	echo '<tr>';
	//	echo '<td>'.$row['card_id'].'</td>';
	//	echo '<td>'.$row['card_name'].'</td>';
	//	echo '<td>'.$row['description'].'</td>';
	foreach($dataResultSet as $row) {
		echo '<tr>';
		foreach($titlesResultSet as $fieldName) {
			echo '<td>'.$row[$fieldName['Field']].'</td>';}
		echo '</tr>';
		}
	echo "</table>";
}


function generateEditDeleteCardTable($tableName, $pk, $titlesResultSet, $dataResultSet)
{

	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." - EDIT/DELETE TABLE</caption>";
	echo '<tr>';
	//foreach($titlesResultSet as $fieldName) {
	//	echo '<th>'.$fieldName['Field'].'</th>';
	//}
	echo '<th>CARD</th><th>DESCRIPTION-EFFECT</th><th>DELETE</th><th>EDIT</th>';
	echo '</tr>';

	//then generate the table of data with buttons for edit and delete
	foreach($dataResultSet as $row) {
		echo '<tr>';
		echo '<td>'.$row['card_name'].'</td>';
		echo '<td>'.$row['description'].'</td>';
		
		echo '<form class="small_button"  action="controller_delete_and_edit_card.php" method="post">';
		echo '<td><input class="smallBtn"  type="submit"  value="Delete" name="btn_select_for_deletion"></td>';
		echo '<td><input class="smallBtn"  type="submit"  value="Edit" name="btn_edit"></td>';
		echo '<input type="hidden" value="'.$row[$pk].'" name="cardID">';//when the button is pressed the 
																				//$index 'hidden' value is inserted 
																				//into the $_POST array
		echo '</form>';

		echo '</tr>';
		}
	echo "</table>";
}


function generateViewDeletePlayTable($tableName, $pk, $titlesResultSet, $dataResultSet, $deckname)
{

	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." - YOUR DECKS</caption>";
	echo '<tr>';
	//foreach($titlesResultSet as $fieldName) {
	//	echo '<th>'.$fieldName['Field'].'</th>';
	//}
	echo '<th>DECK NAME</th><th>DELETE</th><th>VIEW</th><th>ADD CARD</th><th>PLAY</th>';
	echo '</tr>';

	//then generate the table of data with buttons for edit and delete
	foreach($dataResultSet as $row) {
		echo '<tr>';
		echo '<td>'.$row['deck_name'].'</td>';
		
		echo '<form class="small_button"  action="controller_delete_view_playdeck.php" method="post">';
		echo '<td><input class="smallBtn"  type="submit"  value="Delete" name="btn_select_for_deletion"></td>';
		echo '<td><input class="smallBtn"  type="submit"  value="View" name="view"></td>';
		echo '<td><input class="smallBtn"  type="submit"  value="Add" name="add"></td>';
		echo '<td><input class="smallBtn"  type="submit"  value="Play" name="play"></td>';
		echo '<input type="hidden" value="'.$row[$pk].'" name="deckID">';
		echo '<input type="hidden" value="'.$row[$deckname].'" name="deckname">';
		//when the button is pressed the  
		//$index 'hidden' value is inserted 
		//into the $_POST array
		echo '</form>';

		echo '</tr>';
		}
	echo "</table>";
}

function generateViewCardsinDeckTable($tableName, $pk, $titlesResultSet, $dataResultSet, $deckname, $cardkey)
{
	$deckcount = 0;
	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($deckname) ."</caption>";
	echo '<tr>';
	//foreach($titlesResultSet as $fieldName) {
	//	echo '<th>'.$fieldName['Field'].'</th>';
	//}
	echo '<th>CARD NAME</th><th>DELETE</th><th>VIEW</th>';
	echo '</tr>';

	//then generate the table of data with buttons
	foreach($dataResultSet as $row) {
		echo '<tr>';
		echo '<td>'.$row['card_name'].'</td>';
		$deckcount++;
		
		echo '<form class="small_button"  action="controller_view_deckcards.php" method="post">';
		echo '<td><input class="smallBtn"  type="submit"  value="Delete" name="btn_select_for_deletion"></td>';
		echo '<td><input class="smallBtn"  type="submit"  value="View" name="viewcards"></td>';
		echo '<input type="hidden" value="'.$row[$pk].'" name="deckcardID">';
		echo '<input type="hidden" value="'.$row[$cardkey].'" name="cardID">';

		//when the button is pressed the 
		//$index 'hidden' value is inserted 
		//into the $_POST array
		echo '</form>';

		echo '</tr>';
		}

	echo "<caption> Number of cards = " .$deckcount ."</caption>";
	echo "</table>";
}

function generateStatisticsTable($tableName, $titlesResultSet, $dataResultSet)
{
	
	echo "<table border=1>";

	//first - create the table caption and headings
	echo "<caption>".strtoupper($tableName)." TABLE - QUERY RESULT</caption>";
	echo '<tr>';
	foreach($titlesResultSet as $fieldName) {
		echo '<th>'.strtolower($fieldName['Field']).'</th>';
	}
	echo '</tr>';

	//then show the data
	foreach($dataResultSet as $row) {
		echo '<tr>';
		foreach($titlesResultSet as $fieldName) {
			echo '<td>'.$row[$fieldName['Field']].'</td>';}
		echo '</tr>';
		}
	echo "</table>";
}

function generatedropdownmenu($dataResultSet, $id)
{


	echo "<form class='small_button' method ='post' action='" .$_SERVER['PHP_SELF'] . "'>";
	//echo '<form class="small_button" action=' ."$_SERVER['PHP_SELF']"  .' method="post">';
	echo "</br>";
	echo '<select name = "cardname" >';
	//the generate the table of data with buttons for edit and delete
	foreach($dataResultSet as $row) {
		
		echo "<option value = " .$row['card_id'] .">" .$row['card_name'] ."</option>";
		}

	echo '<input type="hidden" value="'  .$row['card_id']   .'" name="cardID">';
	echo '<input type="hidden" value="'  .$row['card_name']   .'" name="cardName">';
	echo "</select>";
	echo "</br>";
	echo '<button  type="submit" value="'  .$id  .'" name="addcard"> Add Card </button>';
	echo "</br>";
    echo '</form>';
}
?>
