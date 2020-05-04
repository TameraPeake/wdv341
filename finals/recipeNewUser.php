<?php
require 'ProjectsdbConnect.php';

$inUsername = "";
$inPassword = "";

if (isset($_POST['newUser'])) {

     $inUsername = $_POST['userName'];
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

     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     echo "<h2>userName: $inNewName</h2>";
     echo "<h2>password: $inNewPassword</h2>";

}

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
  <section id="newSection">
    <p>Enter a new username and password</p>
    <form action="recipeNewUser.php" method="post">
      <p>
        <label for="newusername">Enter Your Username</label><br>
        <input type="text" placeholder="Enter new Username" name="userName" id="userName"required/><br>
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
</body>
</html>
