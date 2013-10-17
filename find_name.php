<?php
session_start();
$con = mysqli_connect("localhost","root","mundjeff","files4u");
if(mysqli_connect_errno($con)>0)
echo "connection error";
$rowSQL = mysqli_query($con,"SELECT * FROM tb_account WHERE email = '".$_SESSION['currentUser']."'");
$row = mysqli_fetch_array($rowSQL);
echo $row['name'];
?>
