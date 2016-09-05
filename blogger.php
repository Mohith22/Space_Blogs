
<!DOCTYPE html>
<html lang="en">
  <head>
    <title> SPACE BLOGS </title>
   <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- jQuery 1.11.1 (Compatible with countdown timer - DO NOT change order of scripts) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="style_sheet.css">
   <link rel="icon" type="image/jpg" sizes="16x16" href="images/logo.jpg">


  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">SPACE BLOGS</a>
    </div>

    <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
      <li><a href="admin.php">Home</a></li>
      <li class="active"><a href="blogger.php">Bloggers</a></li> 
      <li><a href="login.php">LogOut</a></li>
    </ul>
  </div>
</nav>
 </div>  
 <br>
 <br>
 <br>
 <br>
<div class="container">
  <b><p class="about"> Welcome  <?php  session_start(); echo $_SESSION['admin']; ?> </p> </b></div>
  
  <br>
  <br>

  <div class="container">
  <?php
  $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("SpaceBlog", $connection); // Selecting Database from Server 
$result = mysql_query("SELECT User_Id,User_Name FROM blogger") or die('Unable to run query:');

$counter = mysql_num_rows($result);

if ($counter > 0) {

echo "<table class='table'>";
echo " <thead>";
echo "<tr>";
echo "<th>USER ID</th>";
echo "<th>USER NAME</th>";
echo "</tr>";
echo " </thead>";

while ($row = mysql_fetch_array($result)) {
    echo " <tbody>";
    echo "<tr>";
    echo "<td>" . $row['User_Id'] . "</td>";
    echo "<td>" . $row['User_Name'] . "</td>";
    echo "</tr>";
    echo " </tbody>\n";
}
echo "</table>";
}

mysql_close($connection);
  ?>

</div>
<br>
<br>
<br>
<br>
<div class="container">
 <form action="blogger.php" method="post">
 <tr>  
<pre> <b><td>UserID :  </td></b><td><input type="text" name="perm" ></td></pre>   
   </tr> 
   <button class="btn btn-primary btn-md" type="submit" name="submit">Block</button>
    <button class="btn btn-primary btn-md" type="Submit" name="Submit">UnBlock</button>
 </form> 
</div>
  
<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="SpaceBlog"; // Database name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
if(isset($_POST['submit'])){ 
$perm=$_POST['perm'];
$query = mysql_query("update blogger set Permission = 1 where User_Id='$perm'");
}
if(isset($_POST['Submit'])){ 
$perm=$_POST['perm'];
$query = mysql_query("update blogger set Permission = 0 where User_Id='$perm'");
}
?>

 <br>
  <br>
   
    </body>

</html>