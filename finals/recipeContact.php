<?php
//require 'recipeEmailer.php';
require 'recipeEmailer.php';

$inName="";
$inEmail="";
$inConcern="";

if(isset($_POST['contactSubmit'])){
	$inName=$_POST['contactName'];
	$inEmail=$_POST['contactEmail'];
	$inConcern=$_POST['contactConcern'];

/*
      $emailTest = new Emailer();
      $emailTest->set_senderEmail("pet2433@tamerapeake.com");
      echo $emailTest->get_senderEmail();
      echo  $emailTest->sendEmail();
*/
class Emailer {

  private $message = "";
  private $senderEmail ="pet2433@tamerapeake.com";
  private $recipientEmail ="";
  private $subject ="Rife's Recipe's Response";

   public function __construct() { }

 //setter method?
      public function set_message($inConcern) {
        $this->message = $inConcern;
      }

      public function set_senderEmail($inEmail) {
        $this->senderEmail = $inEmail;
      }

      public function set_recipientEmail($inVal) {
        $this->recipientEmail = $inVal;
      }

      public function set_subject($inVal) {
        $this->subject = $inVal;
      }
//getter method?

      public function get_message() {
        return $this->message;
      }

      public function get_senderEmail() {
        return $this->senderEmail;
      }

      public function get_recipientEmail() {
        return $this->message;
      }

      public function get_subject() {
        return $this->subject;
      }

//process
    public function sendEmail() {

      $to = $this->get_senderEmail();
      $subject =$this->get_subject();
      $message =$this->get_message();
      $headers="From: <pet2433@tamerapeake.com>";


      return mail($to,$subject,$message,$headers);
    }
  }
};


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Recipe Contact</title>

<script>

</script>
</head>
<body>
<section id="fullPage">
    <h1>Rifes Recipes: Contact Page</h1>
      <form id="contactForm" name="contactForm" method="post" action="recipeContact.php" >
        <p>Please enter your name:
          <input type="text" name="contactName" id="contactName" value=""/>
        </p>
        <p>Please enter your email:
            <input type="email" name="contactEmail" id="contactEmail" value=""/>
        </p>
        <p>Please enter your concern:
            <input type="text" name="contactConcern" id="contactConcern" value=""/>
        </p>
        <p>
        <input type="submit" name="contactSubmit" id="contactSubmit" value="Submit"/>
        </p>
      </form>
</section>
</body>
</html>
