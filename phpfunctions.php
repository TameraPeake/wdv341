<?php

$date = date_create("18-08-2020");


function usDate() {
	global $date;
	return date_format($date, 'm/d/Y');
}

function internationalDate() {
	global $date;
	return date_format($date, 'd/m/Y');
}



function fixString() {
	$exampleString= "Hello World!";
	$characterString= strlen($exampleString);
	$whiteSpaceString= trim($exampleString);
	$lowerString= strtolower($exampleString);
	
	//does string contain Dmacc?
	
	$finalResult= $characterString." ".$whiteSpaceString." ".$lowerString;
	
	return $finalResult;
}


function doesItContain() {
	$DMACC="DMACC";
	$DesMoines="Des Moines Area College DMACC";

	if(strpos($DesMoines,$DMACC) !==false){
		$true=" it has it";
		return $true;
	}
	
	else{
	
		$falseAnswer=" it doesn't have it";
		return $falseAnswer;
	}
}

//function that accepts a number and displays as formatted 

function formattedNumber() {
	$formattedInput=123456;
	return number_format($formattedInput,2)."";
}

//function that accepts a number and displays as currency

function currencyNumber() {
	$currencyInput=123456;
	setlocale(LC_MONETARY,"en_US");
	return money_format("The price is %i", $currencyInput);
}

?>
<!doctype HTML>
<html>
<head>
<meta charset="utf-8">
<title>PHP Functions</title>
<script>



</script>
</head>
<body>

	<h1>PHP Functions</h1>
	
	<form action="">
		<ol>
		<li>
			<p>
				<span><?php echo usDate(); ?></span><br>
			</p>
		</li>
		<li>
			<p>
				<span><?php echo internationalDate(); ?></span><br>
			</p>
		</li>
		
		<li>
			<p>
				<span><?php echo fixString();  echo doesItContain(); ?></span><br>
			</p>
		</li>
		
		<li>
			<p>
				<span><?php echo formattedNumber(); ?></span><br>
			</p>
		</li>
		
		<li>
			<p>
				<span><?php echo currencyNumber(); ?></span><br>
			</p>
		</li>
	</form>
	
</body>
</html>