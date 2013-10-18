<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>home</title>
        <link rel="stylesheet" type="text/css" href="css/home.css" />
        <link href="css/uploadfile.css" rel="stylesheet">
        </link>
    </head>
    <body>
        <div id="rounded">
            <img src="img/top_bg.gif" alt="top" />
            <div id="main" class="container">
                <div id="titleBar">
                    <div id="title">
                        <h1>Files4U</h1>
                    </div>
                    <div id="accountHead">
                        <button id="titleRightButton" id="accountButton">Hi,
                            <a id="displayName">
                                <?php
                                if (isset($_SESSION['currentName']))
                                    echo $_SESSION['currentName'];
                                else
                                    echo 'user';
                                ?>                            
                            </a><?php
                            if (isset($_SESSION['currentPic']))
                                echo '<img src="profile_pic/' . $_SESSION['currentPic'] . '" alt="account" width="30px" height="30px"/>';
                            else
                                echo '<img src="img/account.png" alt="account" width="20px" height="20px"/>';
                            ?>
                        </button>
                    </div>
                </div>
                <div id="buttonDiv">
                    <button class="mainButton" id="mainButton1">
                        SEARCH
                    </button>
                    <button class="mainButton" id="mainButton2" onclick="uploadTypeChange()">
                        UPLOAD
                    </button>
                    <button class="mainButton" id="mainButton3">
                        YOUR COLLECTION
                    </button>
                </div>
                <div id="contentWithLink">
                    <div id="searchDiv">
                        <div class="bodyLeft">
                            <br>
                            <span id="searchText">Search here for your file...
                            </span>
                            <input id="search" type="text" placeholder="Search"/>
                            <img id="searchImage" onclick="search()" src="images/search.png" alt="search" width="40" height="40"/>
                            <br>
                                <div>
                                    <label id="searchResult">
                                    </label>
                                </div>
                                <button id="subButton1">
                                    <img id="buttonImage1" src="images/files.png" alt="file" width="15" height="15"/>
                                    Files
                                </button>
                                <button id="subButton">
                                    <img id="buttonImage2" src="images/video.png" alt="video" width="15" height="15">
                                        Videos
                                </button>
                                <button id="subButton">
                                    <img id="buttonImage2" src="images/music.png" alt="music" width="15" height="15">
                                        Music
                                </button>
                                <button id="subButton">
                                    <img id="buttonImage2" src="images/photos.png" alt="photo" width="15" height="15">
                                        Photos
                                </button>
                                <button id="download" onclick="downloadItem()">
                                    Download
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear">
                </div>
                <img src="img/bottom_bg.gif" alt="bottom" />
            </div>
            <div id="accountDiv">
                <a href="#" class="accountA" id="accountSettings">My Account</a>
                <a href="index.php" class="accountA" id="signout">Sign out</a>
            </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script src="js/jquery.uploadfile.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle.all.js">
        </script>
        <script type="text/javascript" src="js/files4u.js"></script>
    </body>
</html>
