<?php

$sname= "localhost:8889";
$unmae= "root";
$password = "root";

$db_name = "cs4116";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

