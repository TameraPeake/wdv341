<?php
require 'ProjectsdbConnect.php';

/*
foreach($_POST as $key => $value)		//This will loop through each name-value in the $_POST array
{
}*/
$inRecipeName = "";		//Get the value entered in the first name field
$inSetServingSize = "";	//Get the value entered in the last name field
$inIngredientName = "";
$inSetIngredientSize = "";
$inSetUnits = "";
$inRecipeInstructions = "";

$chooseServing="";
$onePerson="";
$oneTwoPeople="";
$threeFourPeople="";
$sixEightPeople="";
$nineTwelPeople="";
$twelSixPeople="";

$inRecipeNameErrMsg = "";
$inSetServingSizeErrMsg = "";
$inIngredientNameErrMsg = "";
$inSetIngredientSizeErrMsg = "";
$inSetUnitsErrMsg = "";
$inRecipeInstructionsErrMsg = "";

$validForm = true;

if(isset($_POST["button"])){

  $inRecipeName = $_POST["recipeName"];		//Get the value entered in the first name field
  $inSetServingSize = $_POST["setServingSize"];		//Get the value entered in the last name field
  $inIngredientName = $_POST["ingredientName"];
  $inSetIngredientSize = $_POST["setIngredientSize"];
  $inSetUnits = $_POST["setUnits"];
  $inRecipeInstructions = $_POST["recipeInstructions"];

  function validateRecipeName($name) {
      global $validForm, $inRecipeName, $inRecipeNameErrMsg;
      $inRecipeNameErrMsg = "";
      if($name == "")
      {
          $validForm = false;
          $inRecipeNameErrMsg= "Your recipe needs a name!";
      }
  }

  function validateServingSize($size) {
      global $validForm, $inSetServingSize, $inSetServingSizeErrMsg;
      $inSetServingSizeErrMsg = "";
      if($size == "")
      {
          $validForm = false;
          $inSetServingSizeErrMsg= "How many times can I go back for seconds?";
      }
  }

  function validateIngredientName($name) {
      global $validForm, $inIngredientName, $inIngredientNameErrMsg;
      $inIngredientNameErrMsg = "";
      if($name == "")
      {
          $validForm = false;
          $inIngredientNameErrMsg= "What makes up your recipe?";
      }
  }

  function validateSetIngredientSize($size) {
      global $validForm, $inSetIngredientSize, $inSetIngredientSizeErrMsg;
      $inSetIngredientSizeErrMsg = "";
      if($size == "")
      {
          $validForm = false;
          $inSetIngredientSizeErrMsg= "How many do I need?";
      }
  }
  function validateSetUnits($size) {
      global $validForm, $inSetUnits, $inSetUnitsErrMsg;
      $inSetUnitsErrMsg = "";
      if($size == "")
      {
          $validForm = false;
          $inSetUnitsErrMsg= "What's the form of measurement?";
      }
  }

  function validateInstructions($steps) {
      global $validForm, $inRecipeInstructions, $inRecipeInstructionsErrMsg;
      $inRecipeInstructionsErrMsg = "";
      if($steps == "")
      {
          $validForm = false;
          $inRecipeInstructionsErrMsg= "What's do I do next?";
      }
  }

validateRecipeName($inRecipeName);
validateServingSize($inSetServingSize);
validateIngredientName($inIngredientName);
validateSetIngredientSize($inSetServingSize);
validateSetUnits($inSetUnits);
validateInstructions($inRecipeInstructions);
/*
$inRecipeName = "";
$inSetServingSize = "";
$inIngredientName = "";
$inSetIngredientSize = "";
$inSetUnits = "";
$inRecipeInstructions = "";

$inRecipeNameErrMsg = "";
$inSetServingSizeErrMsg = "";
$inIngredientNameErrMsg = "";
$inSetIngredientSizeErrMsg = "";
$inSetUnitsErrMsg = "";
$inRecipeInstructionsErrMsg = "";
*/



if($validForm)	//Check the form flag.  If it is still true all the data is valid and the form is ready to process
{
	// The form  data is valid and can be processed into your database.
  $recipeConfirm=  "Your recipe has been entered";
	echo $recipeConfirm;



try {

  $sql = "SELECT ";
  $sql .= "recipe_name, ";
  $sql .= "recipe_ingredientsName, ";
  $sql .= "recipe_instructions, ";
  $sql .= "recipe_servingSize, ";
  $sql .= "recipe_units, ";
  $sql .= "recipe_ingredientsNumber ";
  $sql .= "FROM rifesrecipes";

  $sql = "INSERT INTO rifesrecipes (recipe_name, recipe_ingredientsName, recipe_instructions, recipe_servingSize, recipe_units, recipe_ingredientsNumber)
    VALUES (':recipe_name', ':recipe_ingredientsName', ':recipe_instructions', ':recipe_servingSize', ':recipe_units', ':recipe_ingredientsNumber')";


  echo "<p>$sql</p>";
  $stmt = $conn->prepare($sql);

  $stmt->bindParam(':recipe_name', $inRecipeName);
  $stmt->bindParam(':recipe_ingredientsName', $inSetServingSize);
  $stmt->bindParam(':recipe_instructions', $inIngredientName);
  $stmt->bindParam(':recipe_servingSize', $inSetIngredientSize);
  $stmt->bindParam(':recipe_units', $inSetUnits);
  $stmt->bindParam(':recipe_ingredientsNumber', $inRecipeInstructions);

  //EXECUTE the prepared statement
  $stmt->execute();

  //Prepared statement result will deliver an associative array


 $stmt->setFetchMode(PDO::FETCH_ASSOC);

}

catch (PDOException $e){
  echo $message;

  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

  error_log($e->getMessage());
  error_log($e->getLine());
  error_log(var_dump(debug_backtrace()));

  header('Location: files/505_error_response_page.php');
}

//exit();		//Finishes the page so it does not display the form again.
}
}




//Retrieve from the server



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rife&#39;s Recipes: recipe input</title>

  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Aclonica" />

  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
  </script>
  <script>

  function loadRecipe() {

  fetch('recipeRecieve.php')
   .then((res) => res.json())
   .then((dataTwo) => {
     var outputRecipe = dataTwo;
        console.log(outputRecipe);
     for(let i=0; i <= outputRecipe.length; i++) {
       var recipeInfo = "<p> Recipe Name: " + outputRecipe[i].recipe_name + "<br>"
                     + "Serving Size: " + outputRecipe[i].recipe_servingSize + "<br>"
                     + "Ingredients: " + outputRecipe[i].recipe_ingredientsName + " x " + outputRecipe[i].recipe_ingredientsNumber + " " + outputRecipe[i].recipe_units + "<br>"
                     + "Instructions: " + "<br>"
                     + "Step 1: " + outputRecipe[i].recipe_instructions; + "</p>"

        document.getElementById("recipeList").innerHTML+= recipeInfo;
      }
   })

   .catch(error => {
     console.error(error);
   });
 }

  </script>
<style>
  section {
    text-align: center;
  }
  form, section:nth-of-type(2), section:nth-of-type(3){
    border: 4px double;
  }
</style>

</head>
<body>
    <section id="recipeInput">
      <h2>Enter Recipe Below</h2>
        <form id="loginForm" name="loginForm" method="post" action="recipeInputPage.php" >
          <p>Recipe Name:
            <input type="text" name="recipeName" id="recipeName" value="<?php echo $inRecipeName; ?>"/>
            <!--<span class="error"><?php echo("$inRecipeNameErrMsg");?></span>-->
          </p>
          <div>
          <label for="setServingSize">Serving size:</label>
          <select name="setServingSize" >
              <option value="">Choose one</option>
              <option value="1 serving"<?php if($onePerson == "1 serving"){echo("selected");}?>>1 Serving</option>/
              <option value="1-2 servings"<?php if($oneTwoPeople == "1-2 servings"){echo("selected");}?>>1-2 Servings</option>
              <option value="3-4 servings"<?php if($threeFourPeople == "3-4 servings"){echo("selected");}?>>3-4 Servings</option>
              <option value="6-8 servings"<?php if($sixEightPeople== "6-8 servings"){echo("selected");}?>>6-8 Servings</option>
              <option value="9-12 servings"<?php if($nineTwelPeople == "9-12 servings"){echo("selected");}?>>9-12 Servings</option>
              <option value="12-16 servings"<?php if($twelSixPeople == "12-16 servings"){echo("selected");}?>>12-16 Servings</option>
          </select>
          </div>
          <!--<span class="error"><?php echo("$inSetServingSizeErrMsg");?></span>-->
            <p>Please Enter Ingredients:<br>
              <input type="text" name="ingredientName" id="ingredientName" value="">
              <span> X </span>
              <label for="setIngredientSize"></label>
              <select name="setIngredientSize" >
                <option value="">#</option>
                <option value="1/4">1/4</option>
                <option value="1/2">1/2</option>
                <option value="1/3">1/3</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
                <!--<span class="error"><?php echo("$inSetIngredientSizeErrMsg");?></span>-->
              <label for="setUnits"></label>
              <select name="setUnits" >
                <option value="">Units: if needed</option>
                <option value="tsp">tsp</option>
                <option value="tbsp">tbsp</option>
                <option value="cup">cup</option>
                <option value="pint">pint</option>
                <option value="gallon">gallon</option>
                <option value="pinch">pinch</option>
              </select>
            <!--<span class="error"><?php echo("$inSetUnitsErrMsg");?></span>-->
            </p>
          </div>
          <p>Instructions:
            <br>
            <input type="text" name="recipeInstructions" id="recipeInstructions" value="">
            <button>Add</button>
          <!--  <button value="add" onclick="addMoreInstructions">Add Next Step</button>-->
          </p>
            <input type="submit" name="button" id="button" value="Submit" />
            <input type="reset" name="button2" id="button2" value="Reset" />
          </p>
        </form>
        <div id="msg">
          <span>Errors:<br>
            <span class="error"><?php echo $inRecipeNameErrMsg; ?></span><br>
            <span class="error"><?php echo $inSetServingSizeErrMsg; ?></span><br>
            <span><?php echo $inIngredientNameErrMsg; ?></span><br>
            <span class="error"><?php echo $inSetIngredientSizeErrMsg ;?></span><br>
            <span class="error"><?php echo $inSetUnitsErrMsg;?></span><br>
          </span>
    </section>
    <section>
          <p><?php echo $inRecipeName; ?></p>
          <p><?php echo $inSetServingSize; ?></p>
          <p><?php echo $inIngredientName; ?></p>
          <p><?php echo $inSetIngredientSize; ?></p>
          <p><?php echo $inSetUnits; ?></p>
          <p><?php echo $inRecipeInstructions; ?></p>
    </section>
    <section>
      <p>choose a recipe:</p>
      <p id="recipeList"></p>
      <button type="button" id="firstRecipe" onclick="loadRecipe()">View first recipe</button>
      <button name="retrieve" id="retrieve">Choose</button>
    </section>
    <section>
      <div id="recipe">
        <p id="recipeName"></p>
        <p>Serving Size:<span id="outServing"></span></p>
        <p>Ingredients:<br>
          <span id="ingredientsList"></span>
        </p>
        <p>Instructions:<br>
          <span id="instructionsList"></span>
        </p>
      </div>
    </section>
</body>
</html>
