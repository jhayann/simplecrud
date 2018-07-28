<?php
include('dbcon.php');
if(isset($_GET['personid'])){
	$srch = $_GET['personid'];
	
	$get = $con->prepare("SELECT * FROM persons WHERE lastname LIKE CONCAT('%',?,'%') AND trash = false ORDER BY lastname ASC");
		$get->bind_param("s",$srch);
		$get -> execute();
		$results = $get->get_result();
	
} else {
$get = $con->prepare("SELECT * FROM persons WHERE trash = false ORDER BY lastname ASC");
		$get -> execute();
		$results = $get->get_result();
		
}
?>