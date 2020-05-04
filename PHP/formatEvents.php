<?php
	//Get the Event data from the server.


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
?>
	<p>
    <?php
        for($i=1; $i <=6; $i++) {
    ?>
        <div class="eventBlock">	
            <div>
            	<span class="displayEvent">Event: <?php echo "WDV341"; ?></span>
                <span>Presenter: <?php echo "Raymond A"; ?></span>
            </div>
            <div>
            	<span class="displayDescription">Description: <?php echo "DAY(CURDATE());";?></span>
            </div>
            <div>
            	<span class="displayTime">Time:</span>
            </div>
            <div>
            	<span class="displayDate">Date:</span>
            </div>
        </div>
    <?php
        }
    ?>
    </p>

<?php
	//Close the database connection	
?>
</div>	
</body>
</html>