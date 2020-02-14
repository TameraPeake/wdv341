<?php

class Emailer {
  // this class will process a php email and send interface

  //PROPERTY DECLARATION

  //access identifier property name
    //if you don't add an access identifier, it defaults to public
  private $message = "";  //can be public or private
  private $senderEmail ="";           //private means that you
  private $recipientEmail ="";         //can't access the identifer
  private $subject ="";                //outside the object

  //CONSTRUCTOR METHOD
    //1.Does NOT make a new object
    //2.Initializes the new object default values

   public function __construct() { }
       //can be left blank and unfilled
  //METHODS
    //3 types of methods

    //setter methods-used to set property values
      //one method per property (generally)
      //all public

      public function set_message($inVal) {
                                  //always has an input parameter
        $this->message = $inVal;  //assign input to message
          //keyword $this means current object. so message is the object being motified
          //-> means
      }

      public function set_senderEmail($inVal) {
        $this->senderEmail = $inVal;
      }

      public function set_recipientEmail($inVal) {
        $this->recipientEmail = $inVal;
      }

      public function set_subject($inVal) {
        $this->subject = $inVal;
      }

    //getter methods-return the property value from the object
      //one method per property (generally)
      //getters are all about retrieving info out of the object and into the programming

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

    //processing methods-everything else
    public function sendEmail() {
      //this will format and send an email to the SMTP mysqlnd_ms_dump_servers
      //it will use the php mail()

      $to = $this->get_SenderEmail();
      $subject =$this->get_Subject();
      $message =$this->get_Message();
      $headers="From: <info@peakeT91.com>";


      return mail($to,$subject,$message,$headers); //a builtin PHP function
      //the mail function should return true or false
      //will received failed to connect because there is no mail server

    }
}




?>
