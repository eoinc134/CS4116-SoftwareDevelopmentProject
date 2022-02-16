<?php

$sname= "localhost:3306";
$unmae= "root";
$password = "root";

$db_name = "dating";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

