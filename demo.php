<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>home</title>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        
        <script type="text/javascript" src="js/files4u.js"></script>
         
         <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle.all.js">
        </script>
         <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet"></link>

<script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>
    </head>
    <body onload="init()">
        <div id="rounded">
            <img src="img/top_bg.gif" alt="top" />
            <div id="main" class="container">
                <div id="title_bar">
                    <div id="title">
                        <h1>Files4U</h1>
                    </div>
                    <div id="account_head">
                        <button id="titleright_button_settings" id="settins_button">
                            <img src="img/settings.png" alt="settings" width="20 px" height="20px"/>
                        </button>
                        <button id="titleright_button" id="account_button">Hi,
			<a id="displayName">
			<?php
			if(isset($_SESSION['currentUser']))
			echo $_SESSION['currentUser'];
			else
			echo 'user';
			?>                            
			</a>
                            <img src="img/account.png" alt="account" width="20px" height="20px"/>
                        </button>
                    </div>
                </div>
                <div id="button_div">
                    <button class="main_button" id="main_button1">
                        SEARCH
                    </button>
                    <button class="main_button" id="main_button2">
                        UPLOAD
                    </button>
                    <button class="main_button" id="main_button3">
                        YOUR COLLECTION
                    </button>
                </div>
                <div id="contentwith_link">
                </div>
            </div>
            <div class="clear"></div>
            <img src="img/bottom_bg.gif" alt="bottom" />
        </div>
        <div id="account_div">
            <a class="account_a" id="account_settings">My Account</a>
            <a href="index.php" class="account_a" id="signout">Sign out</a>
        </div>
    </body>
</html>
