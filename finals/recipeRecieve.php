<?php
//require 'ProjectsdbConnect.php';

$db = mysqli_connect('localhost','root','','projects');
$sth = mysqli_query($db, 'SELECT recipe_name, recipe_ingredientsName, recipe_instructions, recipe_servingSize, recipe_units, recipe_ingredientsNumber FROM rifesrecipes');
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}

echo json_encode($rows);
/*
foreach($_POST as $key => $value)		//This will loop through each name-value in the $_POST array
{
*/


//Retrieve from the server


?>
