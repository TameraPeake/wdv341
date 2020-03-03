<?php
      require 'dbConnect.php'; 
 ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>eventsForm.php</title>

  <!--Note toSelf: combine form info for create a connection file assignment. I.e. $inFirstName= $_POST["FirstName"]; Homework is unit 6. Use the table info from the localhost. Add validation to both the client side and server side. so like a honeypot and the PDO. so javascript & php validations. Don't bother with styling. just get the form done
  //I belive that this assignment
  //requires that we
  1. make a form like the formhandler & exampleform
    this will take inputted info in html and submit it to the linked php page
    you also need a honeypot to validate the information is attribute

    so save each value into their own $variable using $variable=$_POST["valueName"]
    put these in the try and catch


  2. using a prepared statement, you'll then check that it's valid in php and prevent errors if not

  3. put echo statement in the bottom of the page

  final result: database should be updated via the form page
  database inserts-->
  <style>
  #doubleCheck {
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    height: 0;
    width: 0;
    z-index: -1;
  }
  </style>
</head>
<body>

<h1>Events Form</h1>

  <form id="form1" name="form1" method="post" action="updateEvents.php">
    /*this will send the information to the php page*/
    <p>Event Name:
      <input type="text" name="eventName" id="eventName" />
    </p>
    <p>Event Description:
      <input type="text" name="eventDescription" id="eventDescription" />
    </p>
    <p>Event Presenter:
      <input type="text" name="eventPresenter" id="eventPresenter" />
    </p>
    <p>Event Date:
      <input type="text" name="eventDate" id="eventDate" />
    </p>
    <p>Event Time:
      <input type="text" name="eventTime" id="eventTime" />
    </p>
  <!--example of honeypot-->
    <span id="doubleCheck">
        <p>Middle Name:
          <input type="text" name="middleName" id="middleName"/>
        </p>
    </span>
    <p>
      <input type="submit" name="button" id="button" value="Submit" />
      <input type="reset" name="button2" id="button2" value="Reset" />
    </p>
  </form>
</body>
</HTML>
