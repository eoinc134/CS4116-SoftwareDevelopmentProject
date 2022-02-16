<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

     <h1 class="welcome" span-style="line-height:30px">Welcome, <?php echo $_SESSION['name']; ?><img src="john.jpg" height="100" width="100"></h1>
 



     <a href="logout.php" class="logout">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>