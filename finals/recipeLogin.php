<?php
/*
session_cache_limiter('none');
session_start();
include 'ProjectsdbConnect.php';
$inUsername = "";
$inPassword = "";
$validuser= "";

$returnUserName = "";
$returnUserPassword = "";

if ($_SESSION['validuser']=="yes")			//is this already a valid user?
	{
		//User is already signed on.  Skip the rest.
		$message = "Welcome Back!";	//Create greeting for VIEW area
    echo $message." ".$inUsername;

	}
else
	{
    if (isset($_POST['login']))
    {
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

       echo "<h1>Here's your username and password: $returnUserName.$returnUserPassword</h1>";
    }

    if ($returnUserName==$inUsername )		//If this is a valid user there should be ONE row only
			{
        if($returnUserPassword==$inPassword){
  				$_SESSION['validuser'] = "yes";				//this is a valid user so set your SESSION variable
  				$message = "Welcome Back!";
          echo $message." ".$inUsername;
  				//Valid User can do the following things:
        }
			}
    else
			 {
  				//error in processing login.  Logon Not Found...
  				$_SESSION['validuser'] = "no";
  				$message = "Sorry, there was a problem with your username or password. Please try again.";
          echo $message;
			  }
    }
//		$stmt->close();
//		$conn->close();

session_unset();	//remove all session variables related to current session
session_destroy();
*/
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Rife&#39;s Recipes: login</title>

   <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
   <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Aclonica" />

   <script
   src="https://code.jquery.com/jquery-3.4.1.js"
   integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
   crossorigin="anonymous">
   </script>
   <script>
   </script>
</head>
<body>
  <div>
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
  </div>
    </div>
  </form>
</body>
</html>
