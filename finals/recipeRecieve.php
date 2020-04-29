<?php
require 'ProjectsdbConnect.php';

$sql = "SELECT ";
$sql .= "recipe_name, ";
$sql .= "recipe_ingredientsName, ";
$sql .= "recipe_instructions, ";
$sql .= "recipe_servingSize, ";
$sql .= "recipe_units, ";
$sql .= "recipe_ingredientsNumber ";
$sql .= "FROM rifesrecipes";

$stmt = $conn->prepare($sql);

$stmt->execute();
$stmt->fetch();



/*
foreach($_POST as $key => $value)		//This will loop through each name-value in the $_POST array
{
*/


//Retrieve from the server


?>
