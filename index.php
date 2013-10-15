<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Files4U
        </title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="js/jquery.cycle.all.js">
        </script>
        <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
<script src="js/jquery.uploadfile.min.js"></script>
        <script src="js/files4u.js">
        </script>
        <link rel="stylesheet" type="text/css" href="css/files4u.css">
    </head>
    <body>
        <div class="main">
            <div class="head">
                <br><br>
                <div class="head_in">
                    <div id="head_left">Files4U</div>
                    <div class="login">
                        <span>
                            <button id="log">Login</button>
                            <img id="buttonimage2" src="images/twitter.png" alt="twitter" width="15" height="15"/>
                            <img id="buttonimage2" src="images/fb.png" alt="fb" width="15" height="15"/>
                            <img id="buttonimage2" src="images/google.png" alt="google" width="15" height="15"/>
                        </span>
                    </div>
                </div>
            </div> 
            <div id="middle">
                <div class="bodyleft">
                    <br>
                    <span id="searchtext">Search here for your file...</span>
                    <input id="search" type="text" placeholder="Search">
                    <img id="searchimage" src="images/search.png" alt="search" width="40" height="40"/>
                    <br>
                    <button id="subbutton1">
                        <img id="buttonimage1" src="images/files.png" alt="file" width="15" height="15"/>
                        Files
                    </button>
                    <button id="subbutton">
                        <img id="buttonimage2" src="images/video.png" alt="video" width="15" height="15">
                        Videos
                    </button>
                    <button id="subbutton">
                        <img id="buttonimage2" src="images/music.png" alt="music" width="15" height="15">
                        Music
                    </button>
                    <button id="subbutton">
                        <img id="buttonimage2" src="images/photos.png" alt="photo" width="15" height="15">
                        Photos
                    </button>
                    <button id="download">
                        Download
                    </button>
                </div>
                <div class="bodyright">
                    <br>
                    <span id="join">Join now!</span>
                    <br>
                    <br>
                    <button id="socialsite">
                        <img id="buttonimage2" src="images/twitter.png" alt="twitter" width="15" height="15">
                        twitter
                    </button>
                    <button id="socialsite">
                        <img id="buttonimage2" src="images/fb.png" alt="fb" width="15" height="15">
                        facebook
                    </button>
                    <button id="socialsite" >
                        <img id="buttonimage2" src="images/google.png" alt="google" width="15" height="15">
                        google
                    </button>
                    <br>
                    <br>
                    <form id="signup_form">
                        <span id="fillfield">
                            or fill the fields below...
                        </span>
                        <input type="text" id="sign_name" placeholder="User Name" name="name" required>
                        <input type="text" id="sign" placeholder="E-mail" name="email" required>    
                        <input type="password" id="sign_pass" placeholder="Password" name="password" required> 
                        <input type="password" id="sign" placeholder="Confirm password" name="password_confirm" required>
                        
                        <br>
                        <input type="checkbox" checked="check" value="Rememberme" id="remember_me">
                        Remember me
                        <input type="submit" id="sign-up" value="Sign Up">

                    </form>
                </div>
            </div>
            <div class="bottom">
                <div id="bottom_in">
                    <h3 id="most_searched">Most searched...</h3>
                    <div class="ad_div">
                        <img src="images/twitter.png" alt="1" width="250" height="170"/>
                        <img src="images/photos.png" alt="2" width="250" height="170"/>
                        <img src="images/yt.jpeg" alt="3" width="250" height="170"/>
                    </div>
                     <div class="ad_div">
                         <img src="images/twitter.png" alt="1" width="250" height="170"/>
                        <img src="images/photos.png" alt="2" width="250" height="170"/>
                        <img src="images/yt.jpeg" alt="3" width="250" height="170"/>
                    </div>
                     <div class="ad_div">
                         <img src="images/twitter.png" alt="1" width="250" height="170"/>
                        <img src="images/photos.png" alt="2" width="250" height="170"/>
                        <img src="images/yt.jpeg" alt="3" width="250" height="170"/>
                    </div>
                </div>
            </div>

        </div>
        <div id="popup_box" class="login_div">
            <form id="login_form">
                <h4 id="popupBoxClose">X</h4>
                <input type="text" id="log-in" placeholder="E-mail" name="email" required />    
                <input type="password" id="log-in" placeholder="Password" name="password" required/> 

                <div class="inside_login">
                    <br>
                    <label id="error"></label>
                    <br>
                    <span id="remember_me">
                        <input type="checkbox" checked="check" value="Rememberme"/>
                        Remember me
                    </span>
                    <input type="submit" id="log-in_button" value="Log In"/>
                </div>
                <img id="socialimage" src="images/twitter.png" alt="twitter" width="23" height="25">
                <img id="socialimage" src="images/fb.png" alt="fb" width="25" height="25">
                <button >
                    <img id="socialimage" src="images/google.png" alt="google" width="25" height="25"/>
                </button>
                <span id="signinButton">
               
</span>

            </form>
        </div>
   
    </body>
</html>    
