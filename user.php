<?php 
session_start();
if(!isset($_SESSION['username']))
{
  session_destroy();
  header("location: login.php");
}
?>
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
      <li class="active"><a href="user.php">Home</a></li>
      <li><a href="addblog.php" name="blog" id="blog">AddBlog</a></li>  
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
  <b><p class="about"> Welcome <?php
  echo $_SESSION['username']." ...."; ?> </p> </b>
  </div>
  <br>
  <br>
<div class="container">
  <?php
  $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("SpaceBlog", $connection); // Selecting Database from Server 
$result = mysql_query("SELECT Blog_Id,Blog_Title,Blog_Cat,Blog_Desc,User_Name,Image,Blog_Create_Date FROM blog natural join blogger WHERE accept=1 AND User_Id='{$_SESSION['id']}'") or die('Unable to run query:');

$counter = mysql_num_rows($result);

if ($counter > 0) {
while ($row = mysql_fetch_array($result)) {
  echo "<div class='panel panel-primary '>";
  echo " <div class='panel-body'>";

  echo "<br>";
  echo "<b><h1>".$row['Blog_Title']."</h1></b>"."<br> <b><p class='about1'>Blog ID:  ".$row['Blog_Id']."</p></b>";
  echo "<b><p class='about1'>".$row['Blog_Cat']."</p></b>";
  echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Image'] ).'" width="200px" height="200px" />';
  echo "<p class='about1'>".$row['Blog_Desc']."</p>";
  echo " <p class='ctit'> WRITTEN BY : </p>"."<p class='about1'>".$row['User_Name']."</p>"."   <p class='about1'> on"." ".$row['Blog_Create_Date']."</p>";
  echo "</div> </div>";
  echo "<br> <br> <br> <br>";
}

}

mysql_close($connection);
  ?>

</div>
  
    <div class="container">

    
    
         <form class="form-group" action="user.php" method="post" enctype="multipart/form-data"> 
      <div class="form-group">
      <label for="blogid">Select Blog ID:</label>
      <input type="text" name="blogid">
  </div>
       <button class="btn btn-primary btn-md" type="submit" name="delete">Delete</button> 
    </form> 
    </div>
    </body>

</html>

<?php 
  $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("SpaceBlog", $connection);
  if(isset($_POST['delete']))
  {
    $id = $_POST['blogid'];
    $query = mysql_query("SELECT Blog_Id FROM blog WHERE User_Id = '{$_SESSION['id']}' ");
    $row = mysql_fetch_row($query);
    if($row[0] != $id)
    {
      echo " <h3> <p align='center'>  No such Blog ID exits </p></h3> ";
      goto a;
    }
    $q = mysql_query("DELETE FROM blog WHERE Blog_Id = $id AND User_Id = '{$_SESSION['id']}' ");
    if(!$q)
    {
      echo "Unable to run query";
    }
  }
  a:
?>