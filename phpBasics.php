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

var languages = [PHP, HTML, Javascript];

</script>
</head>
<body>
<?PHP
  echo"<h1>$yourName</h1>";

  echo"<p>$number1 + $number2 = $total</p>";

  echo "<h1>$languageAgain</h1>";
?>
<h2><?PHP echo $yourName; ?></h2>
</body>
</html>
