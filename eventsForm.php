<?php
      require 'dbConnect.php';
 ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>eventsForm.php</title>
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
