<!DOCTYPE html>
<html>
<head>
<link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>
</head>
<body>
<h3 id="account_settings_head">Account Settings</h3>
<div id="account_settings_div">
<br>
<form id="form_change_password">
Your name:
<input type="text" id="change_name" name="new_name">
<br>
<img src="img/account.png" alt="profile_picture" width="100 px" height="100px"/>
<br>
<br>
Uplaod your profile picture:
<div id="fileuploader_4">Upload</div>
<button id="change_password">Change password</button>
<div id="change_password_div">
<input type="password" class="change_pass" placeholder="Current password" name="current_pass" >
<input type="password" class="change_pass" id="new_password" placeholder="New password" name="new_pass" >
<input type="password" class="change_pass" placeholder="Confirm new password" name="confirm_new_pass" >


</div>
<br>
 <input type="submit" id="submit_change" value="Save">
</div>

</div>
</form>
<script>
$("#fileuploader_4").uploadFile({
	url:"upload_profile.php",
	allowedTypes:"png,jpeg,jpg",	
	fileName:"myfile"
	});
$(document).ready(function() {
  $("#change_password_div").hide();
    $("#change_password").mouseover(function(){
  	$("#change_password_div").slideDown();
          });
});
</script>
</body>
</html>
