<?php


 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Rife&#39;s Recipes: logout</title>

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
  <p>Login to Rife's Recipes</p>
  <form action="recipeInputPage.php" method="post">
    <div>Please login
      <label for="username">Enter Your Username</label>
      <input type="text" placeholder="Enter Username" name="username" required/>

      <label for="password">Enter Your password</label>
      <input type="password" placeholder="Enter Password" name="password" required/>

    </p>
      <input type="submit" name="button" id="button" value="Submit" />
      <input type="reset" name="button2" id="button2" value="Reset" />
    </p>
    </div>
  </form>
</body>
</html>
