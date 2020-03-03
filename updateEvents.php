<?PHP
    //1. This Php file will connect to the wdv341 database
    //2. It will pull the form data from the $_POST variable
    //3. It will format and INSERT SQL Statement
    //4. It will create a Prepared Statement
    //5. It will bind the parameters to the Prepared Statement
    //6. It will execute the prepared statement to insert into the database
    //7. It will display a success/failure message to the user

  //step 1.
    require 'dbConnect.php';  //this pulls the file DBconnect file into the page. it accesses and runs it
try {
   //step 2. //We hardcoded the data in this instance
  $eventName= $_POST["eventName"];
  $eventDescription= $_POST["eventDescription"];
  $eventPresenter=$_POST["eventPresenter"];
  $eventDate=$_POST["eventDate"];
  $eventTime=$_POST["eventTime"];

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
$stmt->bindParam(':eventName', $eventName);
$stmt->bindParam(':eventDescription', $eventDescription);
$stmt->bindParam(':eventPresenter', $eventPresenter);
$stmt->bindParam(':eventDate', $eventDate);
$stmt->bindParam(':eventTime', $eventTime);
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
$conn = null;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>udpdateevents php</title>



</head>
<body>
    <h1>Thanks for shopping with us!</h1>
    <p>Event Name:<?php echo $eventName ?></p>
    <p>Event Presenter:<?php echo $eventPresenter ?></p>
    <p>Event Description:<?php echo $eventDescription ?></p>
    <p>Event Date:<?php echo $eventDate ?></p>
    <p>Event Time:<?php echo $eventTime ?></p>
</body>
</html>
