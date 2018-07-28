<?php
include('dbcon.php');
if(isset($_POST['register'])){
	$found=false;
	$username=$_POST['user'];
	$password=$_POST['pass'];
	$conpass=$_POST['conpass'];
	if($username == "" || $password == ""){
		header("location:register.php?notice=invalid");
		exit();
	} else if($password != $conpass){
		header("location:register.php?notice=conflictpass");
		exit();
	} else if($username == $password){
		header("location:register.php?notice=insecure");
		exit();
	} else {
		$q = $con->prepare("SELECT username FROM users WHERE username = ?");
		$q->bind_param("s",$username);
		if($q->execute()){
			$q->store_result();
			$cnt=$q->num_rows();
			if($cnt == 1){
			$found = true;
			header('location:register.php?notice=userexist');
			$found=false;
			exit();
			}
			$q->free_result();
		}
		$q->close();
		
	}
	if($found == false){
		$options = [
		'cost' => 10
		];
		$hsh = password_hash($password,PASSWORD_BCRYPT, $options);
		
		$st=$con->prepare("INSERT INTO users(username,password) VALUES(?,?)");
		$st->bind_param("ss",$username,$hsh);
		if($st->execute()){
			session_start();
			$_SESSION['username'] = $username;
			header("location:login.php?user=$username");
		}
		$con->close();
	}
}else if(isset($_POST['logout'])){
	session_start();
	session_unset();
	session_destroy();
	header('location:login.php?greetings=goodbye');
}

?>