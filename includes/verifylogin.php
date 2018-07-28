<?php
include('dbcon.php');
if(isset($_POST['user'])){
$user =  $_POST['user'];
$pass = $_POST['pass'];
$st=$con->prepare("SELECT username, password FROM users WHERE username = ?");
$st->bind_param("s",$user);

if($st->execute()){
		$result=$st->get_result();
		$row = $result->fetch_assoc();
		$hash = $row['password'];
		if(password_verify($pass,$hash)){
			$_SESSION['username'] = $user;
			header('location:index.php');
		} else {
			header('location:login.php?notice=failed');
		}
}
}
?>