<?php
    require 'dbConnect.php';

    try {

      $sql = "SELECT ";
      $sql .= "event_id, ";
      $sql .= "event_name, ";
      $sql .= "event_description, ";
      $sql .= "event_presenter, ";
      $sql .= "event_date, ";
      $sql .= "event_time ";
      $sql .= "FROM wdv341_event";

      echo "<p>$sql</p>";
      $stmt = $conn->prepare($sql);

      //EXECUTE the prepared statement
      $stmt->execute();

      //Prepared statement result will deliver an associative array
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
    }

    catch(PDOException $e) {
      echo $message;

      $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

  	  error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
  	  error_log($e->getLine());
  	  error_log(var_dump(debug_backtrace()));

  	  //Clean up any variables or connections that have been left hanging by this error.

  	  header('Location: files/505_error_response_page.php');	//sends control to a User friendly page
    }
 ?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>SelectEvents.php</title>

<style>
  .eventBlock, th, td {
    border: 1px solid black;
  }

  .eventBlock {
    width:100%;
  }

  #doubleCheck {
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  height: 0;
  width: 0;
  z-i
}
</style>
</head>
<body>
  <main>

      <h1>Display Available Events</h1>
      <!--
      <form id="form1" name="form1" method="post" action="SelectEvents.php">
        <p>Event ID:
          <input type="text" name="eventID" id="eventID" value="<?php echo $eventID ?>"/>
          <span><?php echo $eventIDErrMsg; ?></span>
        </p>
        <p>Event Name:
          <input type="text" name="eventName" id="eventName" value="<?php echo $eventName ?>"/>
          <span><?php echo $eventNameErrMsg; ?></span>
        </p>
        <p>Event Description:
          <input type="text" name="eventDescription" id="eventDescription" value="<?php echo $eventDescription ?>"/>
          <span><?php echo $eventDescriptionErrMsg; ?></span>
        </p>
        <p>Event Presenter:
          <input type="text" name="eventPresenter" id="eventPresenter" value="<?php echo $eventPresenter ?>"/>
          <span><?php echo $eventPresenterErrMsg; ?></span>
        </p>
        <p>Event Date:
          <input type="text" name="eventDate" id="eventDate" value="<?php echo $eventDate ?>"/>
          <span><?php echo $eventDateErrMsg; ?></span>
        </p>
        <p>Event Time:
          <input type="text" name="eventTime" id="eventTime" value="<?php echo $eventTime ?>"/>
          <span><?php echo $eventTimeErrMsg; ?></span>
        </p>
      //example of honeypot
        <span id="doubleCheck">
            <p>Middle Name:
              <input type="text" name="middleName" id="middleName"/>
            </p>
        </span>
        <p>
          <input type="submit" name="event_submit" id="event_submit" value="Submit" />
          <input type="reset" name="reset" id="button2" value="Reset" />
        </p>
      </form>
    -->
      <?php
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
  ?>
  <!--
      <div class="eventBlock">
        <div class="row">Event ID:
          <span class="eventId"><?php echo $row['event_name']; ?></span>
        </div>

        <div class="row">Event Description:
          <span class="eventDescription"><?php echo $row['event_description']; ?></span>
        </div>
        <div class="row">
          <div class="col-1-2">Event Date and Time:
            <span class="eventAddress">Dates: <?php echo $row['event_date'] . " " . $row['event_time'] . "." ?></span>
          </div>
          <div class="col-1-2">Event Name and Presenter:
            <span class="eventName">Location: <?php echo $row['event_name'] . " " . $row['event_presenter'] . "." ?></span>
          </div>
        </div>

      </div>
-->
<table class="eventBlock">
  <tr>
  <th>Event Name</th>
  <th>Event Description</th>
  <th>Event Date and Time</th>
  <th>Event Presenter</th>
  <th>Event ID</th>
  </tr>
  <tr>
    <td><?php echo $row['event_name']; ?></td>
    <td><?php echo $row['event_description']; ?></td>
    <td><?php echo $row['event_date'] . " " . $row['event_time'] . "." ?></td>
    <td><?php echo $row['event_presenter']; ?></td>
    <td><?php echo $row['event_id']; ?></td>
  </tr>
</table>
      <?php
}
  ?>

</main>
</body>
</html>
