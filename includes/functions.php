<?php
 function getData($method){
	 include('dbcon.php');
	 $response = "";
		if($method == "records"){
	 	$get = $con->prepare("SELECT * FROM persons WHERE trash = false ORDER BY id DESC LIMIT 0,100");
		} else {
		$get = $con->prepare("SELECT * FROM persons WHERE trash = true ORDER BY lastname DESC LIMIT 0,100");	
}		$get -> execute();
		$results = $get ->get_result();
		while($row = $results->fetch_assoc()){
			$id = $row['id'];
				$lastname = $row['lastname'];
				$firstname = $row['firstname'];
				$middlename = $row['middlename'];
				$birthday = $row['birthday'];
				$birthplace = $row['birthplace'];
				$gender = $row['gender'];
				$address = $row['address'];
			$response = $response.'
				<tr class="w3-hover-teal">
					<td nowrap>'.$lastname.'</td>
					<td nowrap>'.$firstname.'</td>
					<td nowrap>'.$middlename.'</td>
					<td nowrap>'.$birthday.'</td>
					<td nowrap>'.$birthplace.'</td>
					<td nowrap>'.$gender.'</td>
					<td nowrap>'.$address.'</td>
					<td nowrap><button class="w3-button w3-round w3-teal" onclick="openModal('.$id.')" id="edit">EDIT</button></td>
				</tr>
			';
		}
		echo $response;
		
 }
 if(isset($_POST['data'])){
	 getData("trash");
 }

?>