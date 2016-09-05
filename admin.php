
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
      <li class="active"><a href="admin.php">Home</a></li>
      <li><a href="blogger.php">Bloggers</a></li> 
      <li><a href="logout.php">LogOut</a></li>
    </ul>
  </div>
</nav>
 </div>  
 <br>
 <br>
 <br>
 <br>
<div class="container">
 <b> <p class="about"> Welcome  <?php  session_start(); echo $_SESSION['admin']; ?></p> </div> </b>
  
   <div class="container">
  <?php
  $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("SpaceBlog", $connection); // Selecting Database from Server 
$result = mysql_query("SELECT Blog_Id,Blog_Title,Blog_Cat,Blog_Desc,User_Name,Image,Blog_Create_Date FROM blog natural join blogger WHERE accept=0") or die('Unable to run query:');

$counter = mysql_num_rows($result);

if ($counter > 0) {
while ($row = mysql_fetch_array($result)) {
  echo "<br>";
  echo "<b><u>".$row['Blog_Title']."</u></b>"."  "."Blog ID: ".$row['Blog_Id'];
  echo " --- ";
  echo $row['Blog_Cat'];
  echo "<br><br>";
  echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Image'] ).'" width="200px" height="200px" />';
  echo "<br><br>";
  echo $row['Blog_Desc'];
  echo "<br> <br>";
  echo " <u> WRITTEN BY </u>: ".$row['User_Name'];
  echo "    on"." ".$row['Blog_Create_Date'];
  echo "<br> <br> <br> <br>";
}

}

mysql_close($connection);
  ?>

</div>

<div class="container">

  <form class="form-group" action="admin.php" method="post" enctype="multipart/form-data"> 
    <div class="form-group">
    <label for="blogid">Select Blog ID:</label>
    <input type="text" name="blogid">
  </div>
    <button class="btn btn-primary btn-md" type="submit" name="accept">Accept</button>
    <button class="btn btn-primary btn-md" type="submit" name="reject">Reject</button> 
    </form> 
</div>

<?php 
  $connection = mysql_connect("localhost", "root", ""); 
$db = mysql_select_db("SpaceBlog", $connection); 
  if(isset($_POST['accept']))
  {
    $blogid = $_POST['blogid'];
    $query = mysql_query("UPDATE blog SET accept=1 WHERE Blog_Id=$blogid");
  }
   if(isset($_POST['reject']))
  {
    $blogid = $_POST['blogid'];
    $query = mysql_query("DELETE FROM blog WHERE Blog_Id=$blogid");
  }

?>
  

 
    </body>

</html>