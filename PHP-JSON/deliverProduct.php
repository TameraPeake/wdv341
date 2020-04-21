<?php
	header("Content-Type: application/json; charset=UTF-8");

	$productObj = new stdClass();

	$productObj = array("productName" => "PHP Textbook", "productPrice" => "$129.95", "productPageCount" => "327", "productISBN" => "13-1234435690", );
	//$productObj->productPrice = "$1.99";
//
	$returnObj = json_encode($productObj);	//create the JSON object
	//converting the php object into a Json object and
	//storing it as a PHP variable
//
	echo $returnObj;							//send results back to calling program
	//outputs it to the response object
?>
