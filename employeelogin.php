 <?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee Log In</title>
   <style type="text/css" media="screen">
    #showlne{
      color:red;
    }
  </style>
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
    $usrname="";$pass="";$textErr="";
      $usernameErr=$passErr="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $val=TRUE;
          if (empty($_POST["pass"])) {
            $passErr = "Please Enter password";
            $val=FALSE;
          }
         else {
            $pass= test_input($_POST["pass"]);       
          }

          if (empty($_POST["usrname"])) {
           
            $usernameErr = "Please Enter username";
            $val=FALSE;

          } else {
              $usrname = test_input($_POST["usrname"]);
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
        $dbname = "testdbr";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM employeeinfo WHERE name='$usrname' and password='$pass'";
        $result = $conn->query($sql);

        if ($conn->query($sql) == TRUE && $result->num_rows > 0) {
            // output data of each row
           
            header('location:employeeprofile.php');
            exit();
        } else {
            $textErr ="Invalid User ID or Password";
        }
        $conn->close();    
    }
  ?>
</form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <br>

     <center><h1>Employee Log In</h1></center>
     <a href="Firstpage.html" target=""><h2>Home</h2></a> <a href="category.php" target=""><h2>Back</h2></a>
<hr>
 <center>  <p>User Name:<input type="text" name="usrname" value=""><span class="error">* <?php echo $usernameErr;?></span></p>
        <p>Password  :<input type="password"  name="pass" value=""><span class="error">* <?php echo $passErr;?></span></p>
        <div class="line"></div><br>
        <input type="checkbox" name=rememberme value="yes">Remember Me<br>
        <input type="submit" value="Log In"><a href="Resetpasswordpage.php">Forget Password?</a><br><br>
      <center><span id="showlne"><?php echo $textErr;?></span></center>
  
</form>
</body>
</html>