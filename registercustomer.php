<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
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
    $usrname="";$pass="";$eml="";$phn="";
      $usernameErr=$passErr=$emlErr=$phnErr="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $val=TRUE;
          if (empty($_POST["pass"])) {
            $passErr = "Password is required";
            $val=FALSE;
          }
         else {
            $pass= test_input($_POST["pass"]);       
          }

          if (empty($_POST["usrname"])) {
            $usernameErr = "User Name is required";
            $val=FALSE;
          } else {
              $usrname = test_input($_POST["usrname"]);
          }
            if (empty($_POST["eml"])) {
        $emlErr = "Email is required";
        $val=FALSE;
      } else {
          $eml = test_input($_POST["eml"]);
      }
      if (empty($_POST["phn"])) {
        $phnErr = "This is required";
        $val=FALSE;
      } else {
          $phn = test_input($_POST["phn"]);
      }
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
        $dbname = "testdb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
           $sql = "INSERT INTO userinfo (name,password,email,phone)
    VALUES ('$usrname','$pass','$eml','$phn')";

    if ($conn->query($sql) === TRUE) {
        echo "Registerd successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

        $conn->close();    
    }
  ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <br><br><br>

<center><h1>Registration</h1></center>
   <a href="Firstpage.html" target=""><h2>Back</h2></a> 
   <center>
    <hr>
    <form action="" method="POST">
        <p>Name:<input type="text" name="usrname" value=""><span class="error">* <?php echo $usernameErr;?></span></p>
        <p>Password  :<input type="password"  name="pass" value=""><span class="error">* <?php echo $passErr;?></span></p>
         <p>Email :<input type="email"  name="eml" value=""><span class="error">* <?php echo $emlErr;?></span></p>
          <p>Phone  :<input type="text"  name="phn" value=""><span class="error">* <?php echo $phnErr;?></span></p>

        <input type="submit" value="Sign up">
  </center>
</form>
</body>
</html>