<!DOCTYPE html>
<html>
<head>
  <title>View Order Page</title>
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

<center><h2>View The Orders</h2></center>

<form action=""> 
  <center>
  <select name="orderinfo" onchange="showDivision(this.value)">
    <option value="">Select to view Orders:</option>
    <option value="first">First Order</option>
    <option value="second">Second Order</option>
    <option value="third">Third Order</option>
            <option value="fourth">Fourth Order</option>
                <option value="fifth">Fifth Order</option>
                   <option value="sixth">Sixth Order</option>
  </select>
</form>
<br>
<div id="txtHint">Orders Will be shown here...</div>

<script>
function showDivision(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "showorders4.php?q="+str, true);
  xhttp.send();
}
</script>
</center>
</body>
</html>