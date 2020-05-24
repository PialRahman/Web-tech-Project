<!DOCTYPE html>
<html>
<head>
	 <style>
       html{
      background:url('categorybackground.jpg') no-repeat center center fixed;
      - webkit -background-size:cover;
      -o-background-size:cover;
      background-size:cover;
    }
</style>
	<title>Bills Printing Page</title>
</head>
<body>
	<?php 
if(isset($_POST["submit"]))
$bil = $_POST["bil"];
?>
<form action="billspage.php" method="POST">
	<center>
		<h1>Print The Bill Here</h1>
		<hr>
<p>Enter the Bills:<input type="text" name="bil" value=""></p>
<input type="submit" name="submit" value="Print">
</center>
</form>
</body>
</html>