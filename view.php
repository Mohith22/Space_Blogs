

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

  <b><p class="about" align="center"> Welcome To Space Blogs </p></b>
  
  <br>
  <br>

  <div class="container">
    <form class="form-signin" action="view2.php" method="post"> 
    <pre><p class="about1"> Search By Cateogary :  <input type="text"  name="cat"  /></p>     </pre>
    
    <pre><p class="about1">Search By Blogger    :  <input type="text"  name="blogger"  /></p> </pre>
    <button class="btn btn-primary btn-md" type="submit" name="submit">Search </button>

    </form>
    <br>
    <br>
    <br>
</div>
 
      <div class="col-md-2" ></div>
    </div>

    <div class="container">
  <?php
  $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("SpaceBlog", $connection); // Selecting Database from Server 
$result = mysql_query("SELECT Blog_Id,Blog_Title,Blog_Cat,Blog_Desc,User_Name,Image,Blog_Create_Date FROM blog natural join blogger WHERE accept=1") or die('Unable to run query:');

$counter = mysql_num_rows($result);

if ($counter > 0) {
while ($row = mysql_fetch_array($result)) {
  echo "<div class='panel panel-primary '>";
  echo " <div class='panel-body'>";
  $name = $row['User_Name'];
  echo "<br>";
  echo "<b><h1>".$row['Blog_Title']."</h1></b>"."<br> <b><p class='about1'>Blog ID:  ".$row['Blog_Id']."</p></b>";
  echo "<b><p class='about1'>".$row['Blog_Cat']."</p></b>";
  echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Image'] ).'" width="200px" height="200px" />';
  echo "<p class='about1'>".$row['Blog_Desc']."</p>";
  echo " <p class='ctit'> WRITTEN BY : </p>"."<a href='blogpage.php?name=$name><p class='about1'>".$row['User_Name']."</p></a>"."   <p class='about1'> on"." ".$row['Blog_Create_Date']."</p>";
  echo "</div> </div>";
  echo "<br> <br> <br> <br>";
}

}

mysql_close($connection);
  ?>

</div>

  


 
    </body>

</html>