<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/uploadfile.css" rel="stylesheet">

</head>
<body onload="validate_pass()">
<h3 id="account_settings_head">Account Settings</h3>
<div id="account_settings_div">
<br>

Your name:
<input type="text" id="change_name" name="new_name" required>
<button id="name_done" onclick="name_change_done()">Done</button>
<br>
<?php
				if(isset($_SESSION['currentPic']))
                            	echo '<img src="profile_pic/'.$_SESSION['currentPic'].'" alt="account" width="100px" height="130px"/>';
				else
				echo '<img src="img/account.png" alt="account" width="80px" height="100px"/>';
				?>
<br>
<br>
Uplaod your profile picture:
<div id="fileuploader_4">Upload</div>
<br>
<button id="change_password">Change password</button>
<form id="form_change_password">
<div id="change_password_div">

<input type="password" class="change_pass" placeholder="Current password" name="current_pass">
<input type="password" class="change_pass" id="new_password" placeholder="New password" name="new_pass" >
<input type="password" class="change_pass" placeholder="Confirm new password" name="confirm_new_pass" >

<input type="submit" id="submit_change" value="Done">
</div>
<br>
 
</form>
</div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.uploadfile.min.js"></script>
<script>
var flag=0;
$("#fileuploader_4").uploadFile({
	url:"upload_profile.php",
	allowedTypes:"png,jpeg,jpg",	
	fileName:"myfile"
	});
$(document).ready(function() {
  $("#change_password_div").hide();
    $("#change_password").click(function(){
	if(flag===0){
  	$("#change_password_div").slideDown();
	flag=1;
	}
	else{
	$("#change_password_div").slideUp();
	flag=0;
	}
          });
$("#form_change_password").validate({
        rules: {
            current_pass: {
                required: true,
                minlength: 5
            },
            new_pass: {
                required: true,
                minlength: 5
            },
            confirm_new_pass: {
                required: true,
                minlength: 5,
                equalTo: "#new_password"
            }
        },
        messages: {
            current_pass: {
                required: "Please enter your current password",
                minlength: "Your password must be at least 5 characters long"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            password_confirm: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "incorrect password"
            }
        }


    });
 $("#form_change_password").submit(function() {
 	
            $.ajax({
                type: 'POST',
                url: 'change.php',
                data: {'password': document.getElementById("new_password").value
                },
                success: function(data) {
                    alert("Your Password changed!");
                }
            });
        
});
});
</script>
</body>
</html>
