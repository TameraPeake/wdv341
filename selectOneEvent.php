<?php
    require 'dbConnect.php';

    try {

      $sql = "SELECT ";
      $sql .= "event_name ";
      $sql .= "FROM wdv341_event WHERE event_id='38'";

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

</style>
</head>
<body>
  <main>

      <h1>Display Available Events</h1>

      <?php
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
  ?>

<table class="eventBlock">
  <tr>
  <th>Event Name</th>
  </tr>
  <tr>
    <td><?php echo $row['event_name']; ?></td>
  </tr>
</table>
      <?php
}
  ?>

</main>
</body>
</html>
