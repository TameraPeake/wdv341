<?php

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>test email</title>
</head>
<body>
</body>
  <h1>HELLO WORLD!</h1>
  <?php         //new creates a new object
      require 'Emailer.php'; //require and include allows you to link pages
      //to your page. if there's an error with require, the script will stop
      //loading. if there's an error with include, the script will continue

      $emailTest = new Emailer();
        //receives the function from emailer
      $emailTest->set_senderEmail("peakeT91@gmail.com");
        //stores "peakeT91@gmail.com" inside set_senderEmail and this is all
        //stored into $emailTest
      echo $emailTest->get_SenderEmail();
      //instantiate a new emailer object
      //this writes the information on the browser
      echo  $emailTest->sendEmail(); //send email to SMTP server


   ?>
</html>
