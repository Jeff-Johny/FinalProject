<?php
session_start();
$con = mysqli_connect("localhost","root","mundjeff","files4u");
if(mysqli_connect_errno($con)>0)
echo "connection error";
<div id="account_setting_div">
<label>Your name</label>
<input type="text" id="name_change">
</div>
?>

