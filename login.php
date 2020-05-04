<?php
require 'DBconnect.php';

$inUserName = "";
$inUserPassword= "";

$inUserNameErrMsg = "";
$inUserPasswordErrMsg= "";

$validForm = true;

if(isset($_POST["button"])) {
  $inUserName= $_POST["event_user_name"];
  $inUserPassword= $_POST["event_user_password"];

  echo "<p>User Name: $inUserName";
  echo "<p>User Password: $inUserPassword";

  function validateUserName($inName)
  {
    global $validForm, $inUserName, $inUserNameErrMsg;
    $inUserName = trim($inUserName);
    if($inUserName == "")
    {
      $validForm = false;
      $inUserNameErrMsg = "Please Enter a valid user name";
    }

    elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $inUserName)) {
      $validForm = false;
      $inUserNameErrMsg = "No special characters";
    }
  }

  function validateUserPassword($inPassword)
  {
    global $validForm, $inUserPassword, $inUserPasswordErrMsg;
    $inUserPassword = trim($inUserPassword);
    if($inUserPassword == "")
    {
      $validForm = false;
      $inUserPasswordErrMsg = "Please Enter a valid user password";
    }

//^(?=.*\d).{4,8}$/
    elseif (!preg_match("/^(?=.*\d).{4,8}$/", $inPassword)) {
      $validForm = false;
      $inUserPasswordErrMsg = "Please enter a valid user password";
    }
  }

 validateUserName($inUserName);
  validateUserPassword($inUserPassword);

  session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page.
  session_start();

  if ($_SESSION['validUser'] == "yes")				//is this already a valid user?
  {
    //User is already signed on.  Skip the rest.
    $message = "Welcome Back! $username";	//Create greeting for VIEW area
  }
  else
  {

  }

  if($validForm)
  {
    try {
      $sql = "INSERT INTO event_user (event_user_name, event_user_password)";

        $sql = "SELECT event_user_name, event_user_password FROM event_user WHERE event_user_name = ? AND event_user_password= ?";

        $stmt = $conn-> prepare($sql) or die("<p>SQL String: $sql</p>");

         $stmt->bindParam("ss",$inUserName,$inUserPassword);

         $stmt->execute() or die("<p>Execution </p>" );

         $stmt->setFetchMode(PDO::FETCH_ASSOC);

         $query->bind_result($userName,$passWord);

         $query->store_result();

         $query->fetch();

        if ($query->num_rows == 1 )		//If this is a valid user there should be ONE row only
        {
          $_SESSION['validUser'] = "yes";				//this is a valid user so set your SESSION variable
          $message = "Welcome Back! $inUserName";
          //Valid User can do the following things:
        }
        else
        {
          //error in processing login.  Logon Not Found...
          $_SESSION['validUser'] = "no";
          $message = "Sorry, there was a problem with your username or password. Please try again.";
        }

           $query->close();
           $connection->close();
           exit();
      }

    catch(PDOException $e) {

      $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

      echo $message;
      error_log($e->getMessage());
      error_log($e->getLine());
      error_log(var_dump(debug_backtrace()));
    }
  }
  //  exit();
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login php</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>

  </style>
</head>
<body>
<p>Please Login</p>
  <form id="form1" name="form1" method="post" action="login.php">
    <p>Enter Name:
      <input type="text" name="event_user_name" id="event_user_name" value="">
    </p>
    <p>Enter Password:
      <input type="password" name="event_user_password" id="event_user_password" value="">
      <br>*Password must be between 4-8 number password
    </p>
    <p>
      <input type="submit" name="button" id="button" value="Submit" />
      <input type="reset" name="button2" id="button2" value="Reset" />
    </p>
  </form>

<form

</body>
</html>
