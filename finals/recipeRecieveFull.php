<?php
require 'ProjectsdbConnect.php';

  header("Content-Type: application/json; charset=UTF-8");

try {
	//$productObj = new stdClass();
  $sql = "SELECT ";
  $sql .= "recipeID, ";
  $sql .= "recipe_name, ";
  $sql .= "recipe_ingredientsName, ";
  $sql .= "recipe_instructions, ";
  $sql .= "recipe_servingSize, ";
  $sql .= "recipe_units, ";
  $sql .= "recipe_ingredientsNumber ";
  $sql .= "FROM rifesrecipes";

  $stmt = $conn->prepare($sql);

  $stmt->execute();

  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
   	$productObj[] =  "Recipe Name: ".$row['recipe_name']."<br> Recipe Serving Size: ".$row['recipe_servingSize']." <br> Recipe Ingredients: ".$row['recipe_ingredientsName']." x ".$row['recipe_ingredientsNumber']." ".$row['recipe_units']." <br> Recipe Instructions: ".$row['recipe_instructions'];
  }
  //echo $productObj;

	$returnObj = json_encode($productObj);

  echo $returnObj;


}

   catch(PDOException $e) {
     echo $message;

     $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

     error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
     error_log($e->getLine());
     error_log(var_dump(debug_backtrace()));

     //Clean up any variables or connections that have been left hanging by this error.

     header('Location: files/505_error_response_page.php');	//sends control to a User friendly page
   };


/*
$db = mysqli_connect('localhost','root','','projects');
$sth = mysqli_query($db, 'SELECT recipe_name, recipe_ingredientsName, recipe_instructions, recipe_servingSize, recipe_units, recipe_ingredientsNumber FROM rifesrecipes');
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[]= $r;
}

echo json_encode($rows);*/
/*
foreach($_POST as $key => $value)		//This will loop through each name-value in the $_POST array
{
*/


//Retrieve from the server


?>
