<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	function validatePass($data){ //passwords dont get trimmed
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function matchingPass($pass1, $pass2){ //passwords dont get trimmed
		if($pass1 == $pass2) {
			return true;
		}
		return false;
	}

	$uname = validate($_POST['uname']);
	$pass = validatePass($_POST['password']);
	$passConfirm = validatePass($_POST['confirmPassword']);


	

	if (empty($email)) {
		header("Location: index.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else if(empty($passConfirm)){
        header("Location: index.php?error=Confirm password is required");
	    exit();
	}else if(matchingPass($pass, $passConfirm) == false){
		header("Location: index.php?error=Passwords do not match, please try again");
	    exit();
	}else {


		$sql = "INSERT INTO dating (user, pass) VALUES ('$uname', '$pass');";
		
		$result = mysqli_query($conn, $sql);


		$resultAsArray = (mysqli_fetch_assoc($result));

		if(empty($resultAsArray)){

		header("Location: index.php?error=Username not recognised");
		exit();
		}

		if($uname == getUsername($resultAsArray) && $pass == getPassword($resultAsArray)){
			$_SESSION['user_name'] = getUsername($resultAsArray);
			$_SESSION['name'] = getUsername($resultAsArray);
			$_SESSION['id'] = '79';
			header("Location: home.php");
			exit();
}

	else{
		header("Location: index.php?error=Incorrect Password");
	    exit();
}
	}
		}


// else{
// 	header("Location: index.php");
// 	exit();
// }


function getUsernameAndPassword($array){


	return explode("," ,implode(",", $array));

}

function getUsername($username){

	return (getUsernameAndPassword($username)[0]);
}

function getPassword($password){

	return getUsernameAndPassword($password)[1];
}