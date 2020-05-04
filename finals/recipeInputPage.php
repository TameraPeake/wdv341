<?php
require 'ProjectsdbConnect.php';
session_cache_limiter('none');
session_start();


/////////////////Session Start//////////////////////////
$inUsername = "";
$inPassword = "";
$validuser="placeholder";

$returnUserName = "";
$returnUserPassword = "";

if ($_SESSION['validuser']=="yes")			//is this already a valid user?
	{
		//User is already signed on.  Skip the rest.
	//$message = "Welcome Back!";	//Create greeting for VIEW area
  // echo $message;
 //session_unset();
//session_destroy();
	}
else
	{
    if (isset($_POST['login']))
    {
      include 'ProjectsdbConnect.php';
       $inUsername = $_POST['username'];
       $inPassword = $_POST['password'];


       $sql = "SELECT user_name, user_password FROM recipeloginlogout user WHERE user_name= ? and user_password = ?";

       echo "<p>$sql</p>";

      $stmt = $conn->prepare($sql);
      $stmt->bindParam(1, $inUsername, PDO::PARAM_STR);
      $stmt->bindParam(2, $inPassword, PDO::PARAM_STR);
      $stmt->execute();



      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
       	$returnUserName= $row['user_name'];
        $returnUserPassword= $row['user_password'];
      }
      // echo "<h2>userName: $inUsername</h2>";
      // echo "<h2>password: $inPassword</h2>";

      if ($returnUserName==$inUsername )		//If this is a valid user there should be ONE row only
  		{
          if($returnUserPassword==$inPassword)
          {
    				$_SESSION['validuser'] = "yes";				//this is a valid user so set your SESSION variable
    				$message = "Welcome Back!";
            echo $message." ".$inUsername;
    				//Valid User can do the following things:
          }

          else
          {
            $_SESSION['validuser'] = "no";
            $message = "Sorry, there was a problem with your username or password. Please try again.";
            echo $message;
          }
  		}
      else
  		{
    				//error in processing login.  Logon Not Found...
    				$_SESSION['validuser'] = "no";
    			  $message = "Sorry, there was a problem with your username or password. Please try again.";
          echo $message;
        //  header("recipeLogin.php");
  		}

  //  $stmt->close();
  //  $conn->close();
  }
}
/////////////////////Destroy session//////////////////////////////////////////

if (isset($_POST['logout']))
{
  $_SESSION['logout'] = $_POST["logout"];

  if(isset($_POST['logout']) && ($_POST['logout'] == "LOG OFF")) {
    //unset($_SESSION['name']);
      session_unset();
      session_destroy();
  }
}

/////////////////////Enter New User Name & Password//////////////////////////////////////////
/*$inNewName = "";
$inNewPassword = "";


if (isset($_POST['newUser']))
{
   $inUsername = $_POST['newName'];
   $inPassword = $_POST['newPassword'];

   $sql = "SELECT ";
   $sql .= "user_name, ";
   $sql .= "user_password, ";
   $sql .= "FROM recipeloginlogout";

   //$sql = "SELECT user_name,user_password FROM recipeloginlogout";
   $sql = "INSERT INTO recipeloginlogout (user_name, user_password)
    VALUES (:user_name, :user_password)";
      echo "<p>$sql</p>";
   $stmt = $conn->prepare($sql);	//prepare the query

   $stmt->bindParam(':user_name', $inNewName);
   $stmt->bindParam(':user_password', $inNewPassword);	//bind parameters to prepared statement

   $stmt->execute();

   echo "<h2>userName: $inNewName</h2>";
   echo "<h2>password: $inNewPassword</h2>";
}*/


/////////////////////Session End//////////////////////////////////////////


/////////////////Upload to database rifesrecipes//////////////////////////

/*
foreach($_POST as $key => $value)		//This will loop through each name-value in the $_POST array
{
}*/
  if ($_SESSION['validuser'] == "yes") {

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

if(isset($_POST["submitButton"])){
  include 'ProjectsdbConnect.php';

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

  function validateInstructions($steps) {
      global $validForm, $inRecipeInstructions, $inRecipeInstructionsErrMsg;
      $inRecipeInstructionsErrMsg = "";
      if($steps == "")
      {
          $validForm = false;
          $inRecipeInstructionsErrMsg= "What do I do next?";
      }
  }

	validateRecipeName($inRecipeName);
	validateServingSize($inSetServingSize);
	validateIngredientName($inIngredientName);
	validateSetIngredientSize($inSetServingSize);
	validateInstructions($inRecipeInstructions);


	if($validForm)	//Check the form flag.  If it is still true all the data is valid and the form is ready to process
	{
		// The form  data is valid and can be processed into your database.
	  $recipeConfirm=  "Your recipe has been entered";
		echo $recipeConfirm;



		try {

		  $sql = "SELECT ";
		  $sql .= "recipe_name, ";
			$sql .= "recipe_servingSize, ";
		  $sql .= "recipe_ingredientsName, ";
			$sql .= "recipe_ingredientsNumber ";
			$sql .= "recipe_units, ";
		  $sql .= "recipe_instructions, ";
		  $sql .= "FROM rifesrecipes";

		  $sql = "INSERT INTO rifesrecipes (recipe_name, recipe_servingSize, recipe_ingredientsName, recipe_ingredientsNumber, recipe_units, recipe_instructions)
		    VALUES (:recipe_name, :recipe_servingSize, :recipe_ingredientsName, :recipe_ingredientsNumber, :recipe_units, :recipe_instructions)";


		  echo "<p>$sql</p>";
		  $stmt = $conn->prepare($sql);

		  $stmt->bindParam(':recipe_name', $inRecipeName);
			$stmt->bindParam(':recipe_servingSize', $inSetServingSize);
		  $stmt->bindParam(':recipe_ingredientsName', $inIngredientName);
			$stmt->bindParam(':recipe_ingredientsNumber', $inSetIngredientSize);
		  $stmt->bindParam(':recipe_units', $inSetUnits);
			$stmt->bindParam(':recipe_instructions', $inRecipeInstructions);

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

  function loadRecipeList() {

  	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    	var myObj = xmlhttp.responseText;
			//console.log(xmlhttp.responseText);
			var retrieveObject = JSON.parse(myObj);
	    for(let i=0; i<retrieveObject.length;i++){
	        document.getElementById("displayRecipes").innerHTML += "<option value=" + retrieveObject[i] + ">" + retrieveObject[i] + "</option>";
    	}
    }
  };
  xmlhttp.open("GET", "recipeRecieve.php", true);
  xmlhttp.send();
	document.getElementById("displayRecipes").innerHTML =" ";
}


function showRecipe() {
	var inValue = document.getElementById("displayRecipes").selectedIndex;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var fullObj = xmlhttp.responseText;
			console.log(xmlhttp.responseText);
			var retrieveFull = JSON.parse(fullObj);

				document.getElementById("outRecipe").innerHTML = retrieveFull[inValue];
		}
	};

	xmlhttp.open("GET", "recipeRecieveFull.php", true);
	xmlhttp.send();

}

function cloneClick() {
	var receiveClone = document.getElementById("ingredientsEnter");
	var cln = receiveClone.cloneNode(true);
	document.getElementById("outClonedIng").appendChild(cln);
}

function cloneClickInst() {
	var receiveCloneInst = document.getElementById("instructionsEnter");
	var clnInt = receiveCloneInst.cloneNode(true);
	document.getElementById("outClonedInts").appendChild(clnInt);

}

$(document).ready(function(){
  $("#recipeNameList").click(function(){
    $("#hideRecipes").toggle();
  });

/*	$("#cloneIngredients").click(function(){
		$("#ingredientsEnter").clone().appendTo("outClonedIng");
	});*/
});


function hideRecipeList() {
    document.querySelector('#hideRecipes').style.display = "none";
};

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
<body onload="hideRecipeList()">
    <section id="recipeInput">
      <h2>Enter Recipe Below</h2>
        <form id="enterRecipe" name="enterRecipe" method="post" action="recipeInputPage.php" >
          <p>Recipe Name:
            <input type="text" name="recipeName" id="recipeName" value="<?php echo $inRecipeName; ?>"/>
            <!--<span class="error"><?php echo("$inRecipeNameErrMsg");?></span>-->
          </p>
          <div>
          <label for="setServingSize">Serving size:</label>
          <select name="setServingSize">
              <option value="">Choose one</option>
              <option value="1 serving">1 Serving</option>/
              <option value="1-2 servings">1-2 Servings</option>
              <option value="3-4 servings">3-4 Servings</option>
              <option value="6-8 servings">6-8 Servings</option>
              <option value="9-12 servings">9-12 Servings</option>
              <option value="12-16 servings">12-16 Servings</option>
          </select>
          </div>
          <!--<span class="error"><?php echo("$inSetServingSizeErrMsg");?></span>-->
            <p>Please Enter Ingredients:<br>
							<span id="ingredientsEnter">
									<br>
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
		                <option value="">Units (Optional)</option>
		                <option value="tsp">tsp</option>
		                <option value="tbsp">tbsp</option>
		                <option value="cup">cup</option>
		                <option value="pint">pint</option>
		                <option value="gallon">gallon</option>
		                <option value="pinch">pinch</option>
										<option value="none">-</option>
		              </select>
								<br>
	            <!--<span class="error"><?php echo("$inSetUnitsErrMsg");?></span>-->
							</span>
							<br>
							<div id="outClonedIng"></div>
            </p>
						<button type="button" id="cloneIngredients" onclick="cloneClick()">Add Ingredients</button>
          </div>
          <p>Instructions:
            <br>
						<span id="instructionsEnter">
							<br>
            	<input type="text" name="recipeInstructions" id="recipeInstructions" value="">
							<br>
						</span>
					<br>
					<div id="outClonedInts"></div>
					<button type="button" onclick="cloneClickInst()" >Add Instructions</button>
          </p>
            <input type="submit" name="submitButton" id="submitButton" value="Submit" />
            <input type="reset" name="resetButton" id="resetButton" value="Reset" />
          </p>
        </form>
        <div id="msg">
          <div>Errors:<br>
            <span class="error"><?php echo $inRecipeNameErrMsg; ?></span><br>
            <span class="error"><?php echo $inSetServingSizeErrMsg; ?></span><br>
            <span class="error"><?php echo $inIngredientNameErrMsg; ?></span><br>
            <span class="error"><?php echo $inSetIngredientSizeErrMsg ;?></span><br>
						<span class="error"><?php echo $inRecipeInstructionsErrMsg ;?></span><br>
          </div>
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
			<br>
      <button type="button" id="recipeNameList" onclick="loadRecipeList()">click to load recipe list</button>
			<p id="hideRecipes">
				<select id="displayRecipes"></select>
				<br>
				<div id="outRecipe"></div>
				<br>
				<button type="button" onclick="showRecipe()">Submit choice</button>
			</p>
    </section>
		<br>
    <section>
	    <div>
	    	<button onclick="location.href = 'recipeContact.php';">Send us a message!</button>
	    </div>
    </section>
		<br>
    <section>
      <div>
        <form action="recipeInputPage.php" method="post">
            <input type="submit" name="logout" id="logout" value="LOG OFF"/>
        </form>
      </div>
    </section>
<?php
  }
  else {
?>
    <section>
    <p>Login to Rife's Recipes</p>
    <form action="recipeInputPage.php" method="post">
      <div>Please login
      <p>
        <label for="username">Enter Your Username</label><br>
        <input type="text" placeholder="Enter Username" name="username" id="username"required/><br>
      </p>
      <p>
        <label for="password">Enter Your password</label><br>
        <input type="password" placeholder="Enter Password" name="password" id="password"required/><br>
      </p>
      <p>
        <input type="submit" name="login" id="login" value="Submit" />
        <input type="reset" name="resetlogin" id="resetlogin" value="Reset" />
      </p>
    </section>

    <button id="newUser">New User</button>
<!--
    <section id="newSection">
      <p>Enter a new username and password</p>
      <form action="recipeLogin.php" method="post">
        <p>
          <label for="newusername">Enter Your Username</label><br>
          <input type="text" placeholder="Enter new Username" name="newName" id="userName"required/><br>
        </p>
        <p>
          <label for="password">Enter Your password</label><br>
          <input type="password" placeholder="Enter new Password" name="newPassword" id="newPassword"required/><br>
        </p>
        <p>
          <input type="submit" name="newSubmit" id="newSubmit" value="Submit" />
          <input type="reset" name="resetNew" id="resetNew" value="Reset" />
        </p>
      </form>
    </section>
  -->
<?php
  }
?>
</body>
</html>
