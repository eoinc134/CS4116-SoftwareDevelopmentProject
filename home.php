<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

     <div class="welcomeImage">
     <h1 class="welcome">Welcome, <?php echo $_SESSION['name']; ?><img src="john.jpg" height="100" width="100"></h1>
</div>

     <!-- <div class="logout_button"> -->
     <a class="logout_button" href="logout.php">Logout</a>
<!-- </div> -->

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>