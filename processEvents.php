<?PHP
    //1. This Php file will connect to the wdv341 database
    //2. It will pull the form data from the $_POST variable
    //3. It will format and INSERT SQL Statement
    //4. It will create a Prepared Statement
    //5. It will bind the parameters to the Prepared Statement
    //6. It will execute the prepared statement to insert into the database
    //7. It will display a success/failure message to the user

$inEventName = "";
$inEventDescription = "";
$inEventPresenter = "";
$inEventDate = "";
$inEventTime = "";

//Error Messages
$eventNameErrMsg= "";
$eventDescriptionErrMsg = "";
$eventPresenterErrMsg = "";
$eventDateErrMsg = "";
$eventTimeErrMsg = "";

$validForm = false;

if(isset($_POST["submit"])) {
  $inEventName= $_POST["eventName"];
  $inEventDescription= $_POST["eventDescription"];
  $inEventPresenter=$_POST["eventPresenter"];
  $inEventDate=$_POST["eventDate"];
  $inEventTime=$_POST["eventTime"];


      echo "<h1>Thank you for your order!</h1>";
      echo "<p>eventName: $inEventName";
      echo "<p>eventDescription: $inEventDescription";
      echo "<p>eventPresenter: $inEventPresenter";
      echo "<p>eventDate: $inEventDate";
      echo "<p>eventTime: $inEventTime";


          function validateEventName($inName)
          {
            global $validForm, $eventNameErrMsg;
            $eventNameErrMsg = "";

            if($inEventName == "")
            {
              $validForm = false;
              $eventNameErrMsg = "Name cannot be blank";
            }
          }

          function validateEventDescription($inName)
          {
            global $validForm, $eventDescriptionErrMsg;
            $eventDescriptionErrMsg = "";

            if($inEventDescription == "")
            {
              $validForm = false;
              $eventDescriptionErrMsg = "Input cannot be blank";
            }
          }

          function validateEventPresenter($inName)
          {
            global $validForm, $eventPresenterErrMsg;
            $eventPresenterErrMsg = "";

            if($inEventPresenter == "")
            {
              $validForm = false;
              $eventPresenterErrMsg = "Input cannot be blank";
            }
          }

          function validateEventDate($inDate)
          {
            global $validForm, $eventDateErrMsg;
            $eventDateErrMsg = "";

            if($inEventDate == "")
            {
              $validForm = false;
              $eventDateErrMsg = "Date cannont be blank";
            }
          }

          function validateEventTime($inDate)
          {
            global $validForm, $eventTimeErrMsg;
            $eventTimeErrMsg = "";

            if($inEventTime == "")
            {
              $validForm = false;
              $eventTimeErrMsg = "Time cannont be blank";
            }
          }




  validateEventName($inEventName);
  validateEventDescription($inEventDescription);
  validateEventPresenter($inEventPresenter);
  validateEventDate($inEventDate);
  validateEventTime($inEventTime);

  if($validForm) {
        //step 1.
          require 'DBconnect.php';  //this pulls the file DBconnect file into the page. it accesses and runs it
      try {
         //step 2. //We hardcoded the data in this instance

      //step 3 & 4
      //PDO Prepared Statements
          //A. Prepare the SQL Statements
                //insert into table-name (row names not in strings because it's not a value)
          $sql = "INSERT INTO wdv341_event (event_name, event_description, event_presenter, event_date, event_time)
              VALUES (':eventName', ':eventDescription', ':eventPresenter', ':eventDate', ':eventTime')";
                      //these are named placeholders

          //B. create the prepared statement object
          $stmt = $conn-> prepare($sql);  //creates the prepared statement object from the $sql command

      //Step 5.
      //This binds the parameter to the prepared statement object
      $stmt->bindParam(':eventName', $inEventName);
      $stmt->bindParam(':eventDescription', $inEventDescription);
      $stmt->bindParam(':eventPresenter', $inEventPresenter);
      $stmt->bindParam(':eventDate', $inEventDate);
      $stmt->bindParam(':eventTime', $inEventTime);
                                      //you could also hardcode something in the second section

      //Step 6.
      //Execute the prepared statement
      $stmt->execute();
    }

                    //exec(); expects a SQL statement. So use execute()
    //7. the catch is used to show if there is an error
    catch(PDOException $e){
      echo "Card didn't go through";
    }
  }
}

else {
    echo "<h1>something went wrong</h1>";
}
$conn = null;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>udpdateevents php</title>
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
      <form id="form1" name="form1" method="post" action="processEvents.php">
        /*this will send the information to the php page*/
        <p>Event Name:
          <input type="text" name="eventName" id="eventName" value=" <?php echo $inEventName ?>">
          <span><?php echo $eventNameErrMsg; ?></span>
        </p>
        <p>Event Description:
          <input type="text" name="eventDescription" id="eventDescription" value=" <?php echo $inEventDescription ?>">
          <span><?php echo $eventDescriptionErrMsg; ?></span>
        </p>
        <p>Event Presenter:
          <input type="text" name="eventPresenter" id="eventPresenter" value=" <?php echo $inEventPresenter ?>">
          <span><?php echo $eventPresenterErrMsg; ?></span>
        </p>
        <p>Event Date:
          <input type="text" name="eventDate" id="eventDate" value=" <?php echo $inEventDate ?>">
          <span><?php echo $eventDateErrMsg; ?></span>
        </p>
        <p>Event Time:
          <input type="text" name="eventTime" id="eventTime" value=" <?php echo $inEventTime ?>">
          <span><?php echo $eventTimeErrMsg; ?></span>
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
</html>
