


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
        <li><a href="view.php">View Blogs</a></li>
      <li class="active"><a href="login.php">Sign Up</a></li>
      <li><a href="login_check.php">Login</a></li> 
     
    </ul>
  </div>

</nav>


 </div>  
 <br>
 <br>
 <br>
 <br>

  <b><p class="about" align="center"> Welcome To Space Blogs </p> </b>
  
  <br>
  <br>
   <div class="row">
      <div class="col-md-2" ></div>
      <div class="col-md-8" >    <div class="wrapper">
      
    <form class="form-signin" action="login.php" method="post">       
      <h2 class="form-signin-heading">Sign Up</h2>
      <br>
       
      <input type="text" class="form-control" name="username"  />
       <br>
        
      <input type="password" class="form-control" name="password" />      
      <br>
       
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign Up</button>   
    </form>
  </div></div>


  </div></div>
      <div class="col-md-2" ></div>
    </div>


<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("SpaceBlog", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL

$username = $_POST['username'];
$password = $_POST['password'];
if($username!='' ||$password!='' ){
//Insert Query of SQL
$query = mysql_query("insert into blogger(User_Name, Password, Start_Date) values ('$username', '$password', NOW())");
echo "<br> <br> "."<b><p style='margin-left:220px;'> You Have Successfully Signed Up! <br> Happy Space Blogging NewBie!"."</p> </b>";
}
}
?>
  


 
    </body>

</html>