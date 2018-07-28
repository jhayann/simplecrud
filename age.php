<?php




?>

<html>
<body>

<input type="text" id="age" placeholder="Enter your birthyear">
<br><br>
<input id="myage" type="text" placeholder="your age" disabled />
<b>
<p id="myage_"> </p>
</b>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	
<script type="text/javascript">
 /*function computeAge(e) {
	var bday = e;
	var age = 2018-bday;
	var txt = document.getElementById("myage");
	var p = document.getElementById("myage_");
	txt.value = age;
	p.innerHTML = age;
 } */
 
 $(document).ready(function() {
	  
	 $("#age").change(function(){
		var bday = $("#age").val();
		var age = 2018 - bday;
		$("#myage").val(age);
		$("#myage_").html(age);
					
	});
	 
 });
</script>

</body>
</html>