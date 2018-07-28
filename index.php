<?php
include('includes/getdata.php');
include('includes/account.php');
session_start();
if(!isset($_SESSION['username'])){
	header('location: login.php');
}

?>
<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title>CRUD</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<style>
		
		@media only screen and (max-width: 720px) {
			div.w3-card-4{
				width:100%;
				margin:auto;
				margin-top:100px;
				padding-bottom:10px;
			}
		}
		@media only screen and (min-width: 800px) {
			div.w3-card-4{
				width:80%;
				margin:auto;
				padding-bottom:10px;
				}
		}
		
#loader {
  
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: auto;
  border-radius: 50%;
  width: 100px;
  height: 100px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
    border-top: 16px solid gray;
  border-right: 16px solid #4286f4;
  border-bottom: 16px solid gray;
  border-left: 16px solid #4286f4;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

#edit_div{
	display: none;
}
		
		
	</style>
</head>
<body>
	<div class="w3-bar w3-border w3-grey w3-top">
		<a href="index.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-home"></i></a>
		<form method="GET" action="index.php">
		<input class="w3-input w3-bar-item w3-mobile" name="personid" placeholder="Search by Lastname"/>
		</form>
		<a href="#" id="trash" class="w3-bar-item w3-button w3-right w3-mobile"><i class="fa fa-trash"></i> Show Trash</a>
		<a href="https://drive.google.com/open?id=1-cb92hCHDhx2b1KPSjipLtUKPhO_a9ZF" target="_blank" id="" class="w3-bar-item w3-button w3-right w3-mobile"><i class="fa fa-code"></i> Download Source Code</a>

	</div>
	<div class="w3-container" style="margin-top:50px;">
		<div class="w3-card-4 card" id="45">
			<div class="w3-container w3-teal w3-row">
				<div class="w3-col s6">
				<h2>Input Information</h2></div>
				<div class="w3-col s6" >
				<form method="post" action="">
					<input type="hidden" name="logout">
					<button class="w3-button w3-right" type="submit">Logout</button>
				</form>
				</div>
			</div>
			<div class="w3-row-padding">
				<div class="w3-third">
				<label>Lastname:</label>
					<input class="w3-input w3-round w3-border" id="ln" type="text" placeholder="Lastname">
				</div>
				<div class="w3-third">
				<label>Firstname</label>
					<input class="w3-input w3-round w3-border" id="fn" type="text" placeholder="Firstname">
				</div>
				<div class="w3-third">
				<label>Middlename</label>
					<input class="w3-input w3-round w3-border" id="mn" type="text" placeholder="Middlename">
				</div>
				<div class="w3-third">
				<label>Birthday:</label>
					<input class="w3-input w3-round w3-border" id="bd" type="text" placeholder="Birthday eg. 02/19/1996">
				</div>
				<div class="w3-third">
				<label>Birthplace</label>
					<input class="w3-input w3-round w3-border" id="bp" type="text" placeholder="Birthplace">
				</div> 
				<div class="w3-third">
				<label>Gender</label>
					<select class="w3-select w3-border" id="gn">
						<option value="">Select gender</option>
						<option value="MALE">Male</option>
						<option value="FEMALE">Female</option>
						<option value="Others">Others</option>
					</select>
				</div>
				<div class="w3-col">
				<label>Address</label>
					<input class="w3-input w3-round w3-border" id="ad" type="text" placeholder="Address">
				</div>
				</div>
				<div class="w3-center" style="padding:20px;">
				<button id="submit" class="w3-button w3-teal">REGISTER</button>
				</div>
			</div>
		</div>
		
			<div id="id01" class="w3-modal">
			<div class="w3-modal-content w3-card-4">
			  <header class="w3-container w3-blue"> 
				<span onclick="document.getElementById('id01').style.display='none'" 
				class="w3-button w3-display-topright">&times;</span>
				<h2>EDIT</h2>
			  </header>
			  <br>
			  <div style="display:block;" id="loader"></div>
			  <div class="w3-container" id="edit_div">
				
				
			  </div>
			  <BR>
			  <footer class="w3-container w3-blue">
				<div class="w3-center btn-updel" style="padding:20px;">
				<button id="update" class="w3-button w3-green">UPDATE</button>
				<button id="delete" class="w3-button w3-red">DELETE</button>
				</div>
				<div class="w3-center btn-restore w3-hide" style="padding:20px;">
				<button id="restore" class="w3-button w3-green">RESTORE</button>
				</div>
			  </footer>
				</div>
			</div>
			
		<br>
		<div class="w3-container w3-responsive">
			<table class="w3-table w3-table-all w3-card-4">
				<tr class="w3-teal">
					<th>Lastname</th>
					<th>Firstname</th>
					<th>Middlename</th>
					<th>Birthday</th>
					<th>Birthplace</th>
					<th>Gender</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
				<tbody id="response_data">
					<?php 
						while($row=$results->fetch_assoc()){
							$id = $row['id'];
							$lastname = $row['lastname'];
							$firstname = $row['firstname'];
							$middlename = $row['middlename'];
							$birthday = $row['birthday'];
							$birthplace = $row['birthplace'];
							$gender = $row['gender'];
							$address = $row['address'];	
					?>
					<tr class="w3-hover-teal">
						<td nowrap><?php echo $lastname ?></td>
						<td nowrap><?php echo $firstname ?></td>
						<td nowrap><?php echo $middlename ?></td>
						<td nowrap><?php echo $birthday ?></td>
						<td nowrap><?php echo $birthplace ?></td>
						<td nowrap><?php echo $gender ?></td>
						<td nowrap><?php echo $address ?> </td>
						<td nowrap><button class="w3-button w3-round w3-teal" onclick="openModal('<?php echo $id?>')" id="edit">EDIT</button></td>
					</tr>
						<?php } ?>
				</tbody>
				
			</table>
		</div>
	</div>
		<script type="text/javascript" src="includes/jquery1.7.1.js"></script>
		<script type="text/javascript" src="jquery/main_script.js"></script>
		<script type="text/javascript">
		function openModal(e){
			var id = e;
			var mod = document.getElementById("id01");
				mod.style.display = "block";
				bodyLoad(); 
				$.ajax({
					type: "post",
					url:"includes/updateData.php",
					data:{id:id,getUpdate:"get"},
					cache: false,
					timeout: 5000,
					error: function(XMLHttpRequest, textStatus, errorThrown) { 
						document.getElementById("loader").style.display = "none";
						//alert("Status: " + textStatus); 
						alert("Error: " + errorThrown); 
					},
					success: function (returnData){
						$("#edit_div").html(returnData); 		
						var myVar;
						myVar = setTimeout(showPage, 500);						
					}
					
				});
				
			}
			
			function bodyLoad() { 
				document.getElementById("edit_div").style.display = "none";
				document.getElementById("loader").style.display = "block"; 
			}

			function showPage() {
			  document.getElementById("loader").style.display = "none";
			  document.getElementById("edit_div").style.display = "block";
			}
		</script>
</body>
</html>