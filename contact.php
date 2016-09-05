

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
        <li class="active"><a href="view.php">View Blogs</a></li>
      <li><a href="login.php">Sign Up</a></li>
      <li><a href="login_check.php">Login</a></li> 
     <li><a href="contact.php">ContactUs</a></li> 
    </ul>
  </div>

</nav>


 </div>  
 <br>
 <br>
 <br>
 <br>

  <p class="about" align="center"> Welcome To Space Blogs !</p>
  
    <div class="container">
  <form class="form-group" action="contact.php" method="post" enctype="multipart/form-data"> 
    <div class="form-group">
    <label for="name">Full Name : </label>
    <input type="text" class="form-control" name="name">
  </div>
   <div class="form-group">
    <label for="email">Email : </label>
    <input type="email" class="form-control" name="email">
  </div>

<div class="form-group">
  <label for="desc">Query :</label>
  <textarea class="form-control" rows="5" name="desc"></textarea>
</div>


    <button class="btn btn-primary btn-md" type="submit" name="submit">Submit</button> 
    </form>

  
 <?php
  $connection = mysql_connect("localhost", "root", ""); 
  $db = mysql_select_db("SpaceBlog", $connection); 
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = $_POST['desc'];

    $result = mysql_query("INSERT INTO queries(Name,Email,Query) values('$name' , '$email' ,'$query')") or die('Unable to run query:');
  }
  mysql_close($connection);
  ?>

 
    </body>

</html>