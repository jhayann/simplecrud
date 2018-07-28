<?php
include('dbcon.php');
include('functions.php');
$id = $_POST['id'];

if(isset($_POST['update'])){
	$lastname = strtoupper($_POST['lastname']);
	$firstname = strtoupper($_POST['firstname']);
	$middlename = strtoupper($_POST['middlename']);
	$birthday = $_POST['birthday'];
	$birthplace = strtoupper($_POST['birthplace']);
	$gender = $_POST['gender'];
	$address = strtoupper($_POST['address']);
	$id = (int) $_POST['id'];
		$st = $con->prepare("UPDATE persons SET lastname = ?, firstname = ?, middlename = ?, birthday = ?, birthplace = ?, gender = ?, address = ? WHERE id = ?");
		$st -> bind_param("sssssssi", $lastname,$firstname,$middlename,$birthday,$birthplace,$gender,$address,$id);
		if($st -> execute()){		
			getdata("records");
		} else {
		
		}
	
}else if(isset($_POST['getUpdate'])){
$st = $con->prepare("SELECT * FROM persons WHERE id = ?");
$st->bind_param("s",$id);
$st->execute();
$result = $st->get_result();
$return = "";

 while($row=$result->fetch_assoc()){
	 $lastname = $row['lastname'];
	 $firstname = $row['firstname'];
	 $midname = $row['middlename'];
	 $bday = $row['birthday'];
	 $bplace = $row['birthplace'];
	 $gender = $row['gender'];
	 $add = $row['address'];
	 $male='';
	 $female='';
	 $others='';
	 $gender === "MALE" ? $male='selected':"";
	 $gender === "FEMALE" ? $female='selected':"";
	 $gender === "OTHERS" ? $others='selected':"";
	 $return = $return .'
	 
	 <div class="w3-row-padding">
				<div class="w3-third">
				<label>Lastname:</label>
					<input class="w3-input w3-round w3-border" id="ln_" type="text" value="'.$lastname.'">
				</div>
				<div class="w3-third">
				<label>Firstname</label>
					<input class="w3-input w3-round w3-border" id="fn_" type="text" value="'.$firstname.'">
				</div>
				<div class="w3-third">
				<label>Middlename</label>
					<input class="w3-input w3-round w3-border" id="mn_" type="text" value="'.$midname.'">
				</div>
				<div class="w3-third">
				<label>Birthday:</label>
					<input class="w3-input w3-round w3-border" id="bd_" type="text" value="'.$bday.'">
				</div>
				<div class="w3-third">
				<label>Birthplace</label>
					<input class="w3-input w3-round w3-border" id="bp_" type="text" value="'.$bplace.'">
				</div> 
				<input type="hidden" id="id_" value="'.$id.'">
				<div class="w3-third">
				<label>Gender</label>
					<select class="w3-select w3-border" id="gn_">
						<option value="">Select gender</option>
						<option value="MALE" '.$male.'>Male</option>
						<option value="FEMALE" '.$female.'>Female</option>
						<option value="OTHERS" '.$others.'>Others</option>
					</select>
				</div>
				<div class="w3-col">
				<label>Address</label>
					<input class="w3-input w3-round w3-border" id="ad_" type="text" value="'.$add.'">
				</div>
				</div>
				
	 ';
 }
 echo $return;
}else if(isset($_POST['delete_'])) {
	$query = $con->prepare("UPDATE persons SET trash = true WHERE id = ?");
	$query->bind_param("i",$id);
	if($query->execute()) {
		getData("records");
	}
} else if(isset($_POST['restore'])){
	$query = $con->prepare("UPDATE persons SET trash = false WHERE id = ?");
	$query->bind_param("i",$id);
	if($query->execute()) {
		getData("trash");
	}
}
?>