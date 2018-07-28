$(document).ready(function() {
				$("#submit").click(function(){
					if(validateForm() == true) {
					var ln = $("#ln").val();
					var fn = $("#fn").val();
					var mn = $("#mn").val();
					var bd = $("#bd").val();
					var bp = $("#bp").val();
					var gn = $("#gn").val();
					var ad = $("#ad").val();
					$.ajax({
						type:"post",
						url:"includes/insert.php",
						data:{lastname:ln,firstname:fn,middlename:mn,birthday:bd,birthplace:bp,gender:gn,address:ad},
						timeout: 5000,
						error: function(XMLHttpRequest, textStatus, errorThrown) { 
						//alert("Status: " + textStatus); 
						alert("Error: " + errorThrown); 
						},
						success: function(responseData) {
						 $("#response_data").html(responseData);
						 alert("REGISTRATION SUBMITTED SUCCESSFULLY!");
						  resetForm();
						}
						
					})
					} 
				});
				
				$("#update").click(function(){
					var ln = $("#ln_").val();
					var fn = $("#fn_").val();
					var mn = $("#mn_").val();
					var bd = $("#bd_").val();
					var bp = $("#bp_").val();
					var gn = $("#gn_").val();
					var ad = $("#ad_").val();
					var id = $("#id_").val();
					
					$.ajax({
						type:"post",
						url:"includes/updateData.php",
						data:{lastname:ln,firstname:fn,middlename:mn,birthday:bd,birthplace:bp,gender:gn,address:ad,id:id,update:"update"},
						success: function(response) {
							$("#response_data").html(response);
							alert("UPDATED SUCCESSFULLY!");
							$("#id01").hide();
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) { 
						alert("Status: " + textStatus); 
						alert("Error: " + errorThrown); 
						}
					
						
					});
					
				});
				
				$("#delete").click(function(){
					var con = confirm("Are you sure you want to delete this record? it will be moved in the trash.");
					if(con == true) {
						var id = $("#id_").val();
						$.ajax({
							type:"post",
							url:"includes/updateData.php",
							data:{delete_:id,id:id},
							error: function(XMLHttpRequest, textStatus, errorThrown){
							alert("Error: " + errorThrown); 
							},
							success: function(response) {
							$("#response_data").html(response);
							alert("RECORD MOVED TO TRASH!");
							$("#id01").hide();
							}
						});
					} 
				});
				
				$("#trash").click(function(){
					$(".btn-updel").hide();
					$(".btn-restore").removeClass("w3-hide");
					$.ajax({
						type:"post",
						url:"includes/functions.php",
						data:{data:"1"},
						success: function(response){
							$("#response_data").html(response);
						}
					});
				});
					
				$("#ln").change(function(){
					$("#ln").removeClass("w3-red");
					$("#fn").removeClass("w3-red");
					$("#mn").removeClass("w3-red");
					
				});
				
				$("#restore").click(function(){
					var id = $("#id_").val();
					$.ajax({
						type:"post",
						url:"includes/updateData.php",
						data:{restore:"1",id:id},
						error: function(XMLHttpRequest, textStatus, errorThrown){
							alert("Error: " + errorThrown); 
							alert("PLEASE CHECK YOUR INTERNET CONNECTION");
						},
						success: function(response) {
							alert("RECORD SUCCESSFULLY RESTORED")
							$("#response_data").html(response);
						},
						timeout: 5000
					});
				});
				
});
			
			function resetForm(){
				$("#ln").val('');
				$("#fn").val('');
				$("#mn").val('');
				$("#bd").val('');
				$("#bp").val('');
				$("#gn").val('');
				$("#ad").val('');
			}
			
			function validateForm(){
					var ln = $("#ln").val();
					var fn = $("#fn").val();
					var mn = $("#mn").val();
					var bd = $("#bd").val();
					var bp = $("#bp").val();
					var gn = $("#gn").val();
					var ad = $("#ad").val();
				
				if(ln == "" || fn == "" || mn == "") {
					alert("PLEASE INPUT VALID INFORMATION");
					$("#ln").addClass("w3-pale-red");
					$("#fn").addClass("w3-pale-red");
					$("#mn").addClass("w3-pale-red");
					return false;
				} else {
					return true;
				}
				
			}
			
			

		