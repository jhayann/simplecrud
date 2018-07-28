<?php
include('includes/account.php');
$class="w3-hide";
	if(isset($_GET['notice']) && $_GET['notice'] == "invalid"){
		$class="";
		$notice="Please enter your desire username and password.";
	}else if(isset($_GET['notice']) && $_GET['notice'] == "conflictpass"){
		$class="";
		$notice="The password you enter did not match.";
	}else if(isset($_GET['notice']) && $_GET['notice'] == "userexist"){
		$class="";
		$notice="Your desire username is already exist. Try another.";
	}else if(isset($_GET['notice']) && $_GET['notice'] == "insecure"){
		$class="";
		$notice="Username and password must not be identical.";
	}
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRUD</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<style>
	@media only screen and (min-width: 768px){
			div.main{
			margin:auto;
			width:50%;
			margin-top:50px;
			}
			div.content{
			margin:auto;
			width:60%;
			padding:20px;
			}
	}
	@media only screen and (max-width: 720px){
			div.main{
			margin-top:100px;
			}
			div.content{
			padding:20px;
			}
	}

	div.separator{
		padding:4px;
	}
	a{
		text-decoration:none;
	}
</style>
</head>
<body>
	<div class="w3-bar w3-border w3-grey w3-top">
		<a href="index.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-home"></i></a>
		
		<a href="#" class="w3-bar-item w3-button w3-mobile">REGISTER</a>
	</div>
	<div class="w3-container main">
		<div class="w3-card-4">
			<div class="w3-container w3-teal">
			<h3>REGISTER:</h3>
			</div>
					<div class="w3-panel w3-pale-red w3-display-container <?php echo $class ?>">
					  <span onclick="this.parentElement.style.display='none'"
					  class="w3-button w3-pale-red w3-large w3-display-topright">&times;</span>
					  <h3>INVALID!</h3>
					  <p><?php echo $notice ?></p>
					</div>
				<div class="content w3-center">
				<form method="post" action="">
					<input type="hidden" name="register">
					<input class="w3-input w3-border w3-round" type="text" placeholder="Username" name="user">
						<div class="separator"></div>
					<input class="w3-input w3-border w3-round" type="password" placeholder="Password" name="pass">
						<div class="separator"></div>
						<input class="w3-input w3-border w3-round" type="password" placeholder="Confirm Password" name="conpass">
						<div class="separator"></div>
					<input class="w3-button w3-border w3-block w3-round" type="submit" value="REGISTER">
				</form>
				<p>Already have an account? <a href="login.php"><b>Sign in here.</b></a></p>
				</div>
		</div>
	</div>
</body>
</html>
