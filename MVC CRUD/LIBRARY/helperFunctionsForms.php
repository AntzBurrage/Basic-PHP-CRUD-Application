<?php
//helper functions
function generateCardEditForm($cardID,$cardName,$description,$action)
{
echo '<form class="edit" method="post" action="'.$action.'">';
echo '<div>';
echo '<h2>Edit Card: '.$cardName.'</h2>';
echo '<table class="form">';
//echo '<tr><td>';
echo '<label>';
echo '<span>Card Name</span><input name="EditCardName" type="text" value="'.$cardName.'">';
echo '<span>Description-Effect</span><input name="EditDes" type="text" value="'.$description.'">';
echo '</label>';
//echo '</td></tr>';
//echo '<tr><td>';
//echo '</td></tr>';
//echo '<tr><td>';
echo '<label>';
echo '<span>Hit Enter to SAVE</span>';
echo '<input name="btn_save" type="submit" id="btn_save" value="Save">';
echo '</label>';
//echo '</td></tr>';
echo '</table>';
echo '</div>';
echo '</form>';

}

function generateUserEditForm($userID,$userName,$firstName,$lastName,$auth,$action)
{
echo '<form class="edit" method="post" action="'.$action.'">';
echo '<div>';
echo '<h2>Edit User: '.$userName.'</h2>';
echo '<table class="form">';
//echo '<tr><td>';
echo '<label>';
echo '<span>User Name</span><input name="EditUserName" type="text" value="'.$userName.'">';
echo '<span>First Name</span><input name="EditFirstName" type="text" value="'.$firstName.'">';
echo '<span>Last Name</span><input name="EditLastName" type="text" value="'.$lastName.'">';
echo '<span>Authority ID</span><input name="EditAuth" type="text" value="'.$auth.'">';
echo '</label>';
//echo '</td></tr>';
//echo '<tr><td>';
//echo '</td></tr>';
//echo '<tr><td>';
echo '<label>';
echo '<span>Hit Enter to SAVE</span>';
echo '<input name="btn_save" type="submit" id="btn_save" value="Save">';
echo '</label>';
//echo '</td></tr>';
echo '</table>';
echo '</div>';
echo '</form>';

}


?>
