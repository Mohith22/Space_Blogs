

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
    <title>SPACE BLOGS </title>
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
      <li><a href="user.php">Home</a></li>
      <li class="active"><a href="addblog.php">AddBlog</a></li> 
      <li><a href="logout.php">LogOut</a></li> 
    </ul>
  </div>
</nav>
 </div>  
 <br>
 <br>
 <br>
 <br>
<div class='container'>

  <p class="about" align="center">Welcome <?php echo $_SESSION['username']." !" ; ?></p>
</div>   
  <h2 align="center">Add Your Blog Here !</h2>
             


<br>
<br>
<br>

<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("SpaceBlog", $connection);
  
    $blogid = $_POST['blogid'];
    $tit = mysql_query("select Blog_Title from blog where Blog_Id = '$blogid'");
    $cat = mysql_query("select Blog_Cat from blog where Blog_Id = '$blogid'");
    $desc = mysql_query("select Blog_Desc from blog where Blog_Id = '$blogid'");

    $username =  $_SESSION['username'];
    if(isset($_POST['update']))
    {
      ?>
            <div class="container">
  <form class="form-group" action="update.php" method="post" enctype="multipart/form-data"> 
    <div class="form-group">
    <label for="title">Blog Title:</label>
    <input type="text" class="form-control" name="title" value =  "<?php echo htmlspecialchars($tit); ?>" />
  </div>
   <div class="form-group">
    <label for="cat">Blog Category:</label>
    <input type="text" class="form-control" name="cat" value = "<?php echo htmlspecialchars($cat); ?>" />
  </div>

<div class="form-group">
  <label for="desc">Description:</label>
  <textarea class="form-control" rows="10" name="desc" value = " <?php echo htmlspecialchars($desc); ?> " ></textarea>
</div>
<div class="form-group">
  <label for="desc">Image:</label>
  <input type="file" name="image" />
</div>
    <button class="btn-primary " type="submit" name="sub">Submit</button> 
    </form>


</div>
<?php
    }
    if(isset($_POST['delete']))
    {

    }
   
?>

  <br>

<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("SpaceBlog", $connection); //  // Closing Connection with Server
if(isset($_POST['sub'])){ // Fetching variables of the form which travels in URL


$tit = $_POST['title'];
$cat = $_POST['cat'];
$desc = $_POST['desc'];
$username =  $_SESSION['username'];

$name= mysql_real_escape_string($_FILES['image']['name']);
$image= mysql_real_escape_string(file_get_contents($_FILES['image']['tmp_name']));

if($tit !=''||$cat !='' ||$desc !=''){
//Insert Query of SQL
  
$query = mysql_query("insert into blog(User_Id, Blog_Title,Blog_Desc,Blog_Cat,Image_Name,Image) values ('{$_SESSION['id']}', '$tit','$desc', '$cat' , '$name' ,'$image') where Blog_Id ='$blogid'");
if (!$query)
  {
  echo("Error description: " . mysql_error($connection));
  }
}
else{
echo "<br/><br/><br/><br/><br/><br/><br/><br/><p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}

?>


 
    </body>

</html>

