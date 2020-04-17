<?php
	//Get the Event data from the server.
  require 'DBconnect.php';
  try {

    $sql = "SELECT ";
    $sql .= "event_name, ";
    $sql .= "event_description, ";
    $sql .= "event_presenter, ";
    $sql .= "event_date, ";
    $sql .= "event_time ";
    $sql .= "FROM wdv341_event ORDER BY event_name DESC, DATE_FORMAT(event_date, '%d-%m-%Y') ";


    //$date = date("Y-m-d H:i:s",strtotime($date))

    echo "<p>$sql</p>";
    $stmt = $conn->prepare($sql);

    //EXECUTE the prepared statement
    $stmt->execute();

    //Prepared statement result will deliver an associative array
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
  }

  catch(PDOException $e) {

  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

    echo $message;
    error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
    error_log($e->getLine());
    error_log(var_dump(debug_backtrace()));

    //Clean up any variables or connections that have been left hanging by this error.

  //  header('Location: files/505_error_response_page.php');	//sends control to a User friendly page

  }

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV341 Intro PHP  - Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;
		}

		.displayEvent{
			text_align:left;
			font-size:18px;
		}

		.displayDescription {
			margin-left:100px;
		}
	</style>
</head>

<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Example Code - Display Events as formatted output blocks</h2>
    <h3>??? Events are available today.</h3>

<?php
	//Display each row as formatted output in the div below
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
?>

	<p>
        <div class="eventBlock">
            <div>
            	<span class="displayEvent">Event: <?php echo $row['event_name']; ?></span>
            </div>
            <div>
              <span>Presenter: <?php echo $row['event_presenter']; ?></span>
            </div>
            <div>
            	<span class="displayDescription">Description: <?php echo $row['event_description']; ?></span>
            </div>
            <div>
            	<span class="displayTime">Time: <?php echo $row['event_time']; ?></span>
            </div>
            <div>
            <span class="displayDate">Date:

                 <?php

                  $newRow = $row['event_date'];
                  $eventDate = strtotime($newRow);

                  $postDate = date("m-d-Y", $eventDate);
                  $postMonth = date("m", $eventDate);

                  //echo $postMonth. " ". $currentMonth;
                  //$dt = new DateTime(date("Y-m-d"));
                  $currentDate = strtotime(date("Y-m-d"));
                  $currentMonth = date('m');

                  //echo $currentDate. " " .$secondRow;
                  if($eventDate > $currentDate) {
                    if ($postMonth == $currentMonth) {
                      ?>
                      <span style="color:red;"><b><em>
                        <?php echo $postDate; ?>
                      </em></b></span>
                      <?php
                    }

                    else {
                      ?>
                        <span><em>
                          <?php echo $postDate; ?>
                        </em></span>
                      <?php
                    }
                  }
                  elseif ($eventDate == $currentDate) {
                    ?>
                    <span style="color:green;"><b>
                    <?php echo $postDate; ?>
                  </b></span>
                    <?php
                  }
                  elseif ($eventDate < $currentDate) {
                    if ($postMonth == $currentMonth) {
                      ?>
                      <span style="color:red;">
                        <?php echo $postDate; ?>
                      </span>
                      <?php
                    }

                    else {
                      ?>
                        <span>
                          <?php echo $postDate; ?>
                        </span>
                      <?php
                    }
                  }
              
                      ?>
              </span>
            </div>
        </div>
    </p>

<?php
	//Close the database connection
  }
?>
</div>
</body>
</html>
