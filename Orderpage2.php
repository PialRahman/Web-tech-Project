<!DOCTYPE html>
<html>
<head>
  <title>Order Page</title>
  <style>
    html{
      background:url('categorybackground.jpg') no-repeat center center fixed;
      - webkit -background-size:cover;
      -o-background-size:cover;
      background-size:cover;
    }
  </style>
</head>
<body>
  <?php
      $val=FALSE;
       $oi="";$c1="";$c2="";$c3="";$c4="";$c5="";$c6="";$c7="";$c8="";$c9="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $val=TRUE;
          $oi= test_input($_POST["oi"]);       
          $c1 = test_input($_POST["c1"]);
          $c2 = test_input($_POST["c2"]);
          $c3 = test_input($_POST["c3"]);
          $c4 = test_input($_POST["c4"]);       
          $c5 = test_input($_POST["c5"]);
          $c6 = test_input($_POST["c6"]);
          $c7 = test_input($_POST["c7"]);
           $c8 = test_input($_POST["c8"]);
          $c9 = test_input($_POST["c9"]);
      
      }

      function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  ?>
  
  <?php 
    if($val){
      $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "testdbordr";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
           $sql = "INSERT INTO orderinfo (orderno,chocolate,caramel,vanilla,latte,spanishlatte,espresso,black,longblack,turkish)
    VALUES ('$oi','$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$c9')";

    if ($conn->query($sql) === TRUE) {
        echo "Your Order Has Been Placed!!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

        $conn->close();    
    }
  ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <br><br><br>

<center><h1>Order Your Coffees</h1></center>
   <center>
    <hr>
        <p>Order :<input type="text" name="oi" value="">
        <p>Chocolate Cold Coffee  :<input type="text"  name="c1" value="">
         <p>Caramel Cold Coffee :<input type="text"  name="c2" value="">
          <p>Vanilla Cold Coffee:<input type="text"  name="c3" value="">
         <p>Latte Coffee:<input type="text" name="c4" value="">
         <p>Spanish Latte Coffee:<input type="text" name="c5" value="">
         <p>Espresso Coffee:<input type="text" name="c6" value="">
          <p>Black Coffee:<input type="text" name="c7" value="">
         <p>Long Black Coffee:<input type="text" name="c8" value="">
         <p>Turkish Coffee:<input type="text" name="c9" value=""><br><br>
        <input type="submit" value="Order">
  </center>

</body>
</html>