<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/uploadfile.css" rel="stylesheet">
    </head>
    <body onload="validatePass()">
        <h3 id="accountSettingsHead">Account Settings</h3>
        <div id="accountSettingsDiv">
            <br>
            Your name:
            <input type="text" id="changeName" name="newName" required>
            <button id="nameDone" onclick="nameChangeDone()">Done</button>
            <br>
            <?php
            if (isset($_SESSION['currentPic']))
                echo '<img src="profile_pic/' . $_SESSION['currentPic'] . '" alt="account" width="100px" height="130px"/>';
            else
                echo '<img src="img/account.png" alt="account" width="80px" height="100px"/>';
            ?>
            <br>
            <br>
            Uplaod your profile picture:
            <div id="fileUploader4">Upload</div>
            <br>
            <button id="changePasswordButton">Change password</button>
            <form id="formChangePassword">
                <div id="changePasswordDiv">
                    <input type="password" class="changePass" id="currentPassword" placeholder="Current password" name="currentPass">
                    <input type="password" class="changePass" id="newPassword" placeholder="New password" name="newPass" >
                    <input type="password" class="changePass" placeholder="Confirm new password" name="confirmNewPass" >
                    <input type="submit" id="submitChange" value="Done">
                </div>
                <br>
            </form>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.uploadfile.min.js"></script>
    <script>
        var flag = 0;
        $("#fileUploader4").uploadFile({
            url: "uploadProfile.php",
            allowedTypes: "png,jpeg,jpg",
            fileName: "myfile"
        });
        $(document).ready(function() {
            $("#changePasswordDiv").hide();
            $("#changePasswordButton").click(function() {
                if (flag === 0) {
                    $("#changePasswordDiv").slideDown();
                    flag = 1;
                }
                else {
                    $("#changePasswordDiv").slideUp();
                    flag = 0;
                }
            });
            $("#formChangePassword").validate({
                rules: {
                    currentPass: {
                        required: true,
                        minlength: 5
                    },
                    newPass: {
                        required: true,
                        minlength: 5
                    },
                    confirmNewPass: {
                        required: true,
                        minlength: 5,
                        equalTo: "#newPassword"
                    }
                },
                messages: {
                    currentPass: {
                        required: "Please enter your current password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    newPass: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirmNewPass: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "incorrect password"
                    }
                },
                submitHandler: function() {
                    $.ajax({
                        type: 'POST',
                        url: 'change.php',
                        data: {'password': document.getElementById("newPassword").value,
                            'currentPasswordCheck': document.getElementById("currentPassword").value
                        },
                        success: function(data) {
                            alert(data);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
