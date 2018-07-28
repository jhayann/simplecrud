<?php
include('dbcon.php');
include('functions.php');
$lastname = strtoupper($_POST['lastname']);
$firstname = strtoupper($_POST['firstname']);
$middlename = strtoupper($_POST['middlename']);
$birthday = $_POST['birthday'];
$birthplace = strtoupper($_POST['birthplace']);
$gender = $_POST['gender'];
$address = strtoupper($_POST['address']);

	$que = $con->prepare("INSERT INTO persons(lastname, firstname, middlename, birthday, birthplace, gender, address) VALUES(?,?,?,?,?,?,?)");
	$que -> bind_param("sssssss", $lastname,$firstname,$middlename,$birthday,$birthplace,$gender,$address);
	if($que -> execute()){		
		getData("records");
	} else {
		
	}


?>