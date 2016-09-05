$(document).ready(function(){

	$("#upload").click(function(){

		var flname = $("#flname").val();
		var email = $("#email").val();
		var adress = $("#adress").val();
		var postnumber = $("#postnumber").val();
		var fileUpload = $('#fileUpload').prop('files')[0];
		var commentArea = $("#commentArea").val();
		var formData = new FormData(); 
		formData.append('flname', flname);
		formData.append('email', email);
		formData.append('adress', adress);
		formData.append('postnumber', postnumber);
		formData.append('commentArea', commentArea);
		formData.append('fileUpload', fileUpload);
		$.ajax({
			type: "POST",
			url: "upload.php",
			data: formData,
			processData: false,
			contentType: false,
			success: function(result){
				alert(result);
			}
		});
	});

	$("#login").click(function(){

		var username = $("#username").val();
		var password = $("#password").val();
		var formData = new FormData(); 
		formData.append('username', username);
		formData.append('password', password);
		$.ajax({
			type: "POST",
			url: "login.php",
			data: formData,
			processData: false,
			contentType: false,
			success: function(result){
				if(result == 0) {
					alert('Fel användarnamn eller lösenord');
				}
				else {
				window.location.replace("adminView.php");
				}
			}
		});
	});
});