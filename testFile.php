<?PHP
    //1. This Php file will connect to the wdv341 database
    //2. It will pull the form data from the $_POST variable
    //3. It will format and INSERT SQL Statement
    //4. It will create a Prepared Statement
    //5. It will bind the parameters to the Prepared Statement
    //6. It will execute the prepared statement to insert into the database
    //7. It will display a success/failure message to the user
require 'DBconnect.php';
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

$validForm = true;
$inTest = "";

if(isset($_POST["submit"])) {
  echo "<h1>Thank you for your order!</h1>";
  $inTest = "It's working";
  echo $inTest;
  $inEventName= $_POST["eventName"];
  $inEventDescription= $_POST["eventDescription"];
  $inEventPresenter=$_POST["eventPresenter"];
  $inEventDate=$_POST["eventDate"];
  $inEventTime=$_POST["eventTime"];

      echo "<p>eventName: $inEventName";
      echo "<p>eventDescription: $inEventDescription";
      echo "<p>eventPresenter: $inEventPresenter";
      echo "<p>eventDate: $inEventDate";
      echo "<p>eventTime: $inEventTime";


  if($validForm) {
        //step 1.
            //this pulls the file DBconnect file into the page. it accesses and runs it
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
  else {
      echo "<h1>something went wrong</h1>";
      $eventNameErrMsg= "test";
      $eventDescriptionErrMsg = "wrong";
      $eventPresenterErrMsg = "wrongTest";
      $eventDateErrMsg = "wrong2";
      $eventTimeErrMsg = "wrong3";
      $validForm = false;
  }
}
$conn = null;
?>
