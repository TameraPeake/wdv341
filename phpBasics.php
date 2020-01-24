<?PHP
$yourName = "Tamera";

$number1 =5;
$number2=3;
$total = $number1 + $number2;

$languageAgain = array("PHP", "HTML", "Javascript")
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>PHP Basics</title>

<script>

//var languages = [PHP, HTML, Javascript]; Am I trying to change a javascript array
//to a php?

</script>
</head>
<body>
<?PHP
  echo"<h1>$yourName</h1>";

  echo"<p>$number1 + $number2 = $total</p>";

  echo "Here is a list of languages:"." ".$languageAgain[0]." ".$languageAgain[1]." ".$languageAgain[2];
?>
<h2><?PHP echo $yourName; ?></h2>
</body>
</html>
