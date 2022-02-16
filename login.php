<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM dating.users WHERE username='$uname' AND pass='$pass'";


		$result = mysqli_query($conn, $sql);

		$resultAsArray = (mysqli_fetch_assoc($result));

		if($uname == getUsername($resultAsArray) && $pass == getPassword($resultAsArray)){
			$_SESSION['user_name'] = getUsername($resultAsArray);
			$_SESSION['name'] = getUsername($resultAsArray);
			$_SESSION['id'] = '79';
			header("Location: home.php");
			exit();

}
	}
		}


else{
	header("Location: index.php");
	exit();
}


function getUsernameAndPassword($array){


	return explode("," ,implode(",", $array));

}

function getUsername($username){

	return (getUsernameAndPassword($username)[0]);
}

function getPassword($password){

	return getUsernameAndPassword($password)[1];
}