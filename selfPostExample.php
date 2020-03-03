<?php

  //assign a default value to input fields and error messages

  $inProdName = "";
  $inProdPrice = "";
  $inRadio = "";

  $prodNameErrMsg = "";
  $inProdPriceErrMsg = "";
  $inProdRadioErrMsg = "";

  if(isset($_POST["prod_submit"]))
  {
    echo "<h1> Thank you for submitting the form!</h1>";

    $inProdName = $_POST["prod_name"];
    $inProdPrice = $_POST["prod_price"];

    if(isset($_POST['radio'])) {  //if radio is checked, store the value
      $inRadio = $_POST["radio"];
    }

    echo "<p>prod_name: $inProdName";
    echo "<p>prod_price: $inProdPrice";
    echo "<p>radio: $inRadio";


    $validForm = false; //sets a flag/switch to make sure form data is valid
    //PHP validation go here

    
    if($validForm) {
        //yes good data- do database stuff here!
    }

    else {
       //Bad data- deliver error message
      //1. Bad NAME
        //put data on the form
                $inProdName;
        //put error message on the form
                $prodNameErrMsg = "Invalid Name Field";
        //change $validForm=false
      //2. Bad Price
          //same
              $inProdPrice;

              $inProdPriceErrMsg = "Invalid Price";
      //3. Select a radio button
        //same

              $inProdRadioErrMsg = "Please choose an option";

            $validForm = false;
    }
  }
  else
  {
    echo "<h1>Please enter your information</h1>";
  }
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<h1>WDV341 Intro PHP </h1>
<h2>Unit-8 Self Posting Form</h2>
<h3>Example Form</h3>
<p>Converting a form to a self posting form.</p>
<form name="form1" method="post" action="selfPostExample.php" value="Wagon">
  <p>
    <label for="prod_name">Product Name: </label>
    <input type="text" name="prod_name" id="prod_name" value=" <?php echo $inProdName ?>">
    <span><?php echo $prodNameErrMsg; ?></span>
  </p>
  <p>
    <label for="prod_price">Product Price: </label>
    <input type="text" name="prod_price" id="prod_price" value=" <?php echo $inProdPrice ?>">
    <span><?php echo $inProdPriceErrMsg; ?></span>
  </p>
  <p>Product Color: <?php echo $inProdRadioErrMsg; ?></p>
  <p>

    <input type="radio" name="radio" id="prod_red" <?php if ($inRadio=="prod_red") echo "checked";?> value="prod_red">
    <label for="prod_red">Red Wagon<br>
    </label>

    <input type="radio" name="radio" id="prod_green" <?php if ($inRadio=="prod_green") echo "checked";?> value="prod_green">
    <label for="prod_green">Green Wagon</label>
  </p>
  <p>
    <input type="submit" name="prod_submit" id="prod_submit" value="Submit">
    <input type="reset" name="Reset" id="button" value="Reset">
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
