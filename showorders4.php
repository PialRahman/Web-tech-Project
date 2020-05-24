<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$mysqli = new mysqli("localhost", "root", "", "testdbordr");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT `orderno`, `chocolate`, `caramel`, `vanilla`, `latte`, `spanishlatte`, `espresso`, `black`, `longblack`, `turkish` FROM `orderinfo` WHERE orderno =?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($oi, $c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9);
$stmt->fetch();
$stmt->close();
echo "orderno:" . $oi . "</p>";
 echo "Chocolate Cold Coffee:" . $c1 . "</p>";
echo "Caramel Cold Coffee:" . $c2 . "</p>";
  echo "Vanilla Cold Coffee:" . $c3 . "</p>";
 echo "Latee Coffee:" . $c4 . "</p>";
 echo "Spanish Coffee:" . $c5 . "</p>";
 echo "Espresso Coffee:" . $c6 . "</p>";
 echo "Black Coffee:" . $c7 . "</p>";
 echo "LongBlack Coffee:" . $c8 . "</p>";
 echo "Turkish Coffee:" . $c9 . "</p>";
?>
</body>
</html>