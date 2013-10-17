<?php
session_start();
$con = mysqli_connect("localhost","root","mundjeff","files4u");
if(mysqli_connect_errno($con)>0)
    echo "connection error";

$i=mysqli_query($con,"update tb_account set password='".$_POST['password']."' where email='".$_SESSION['currentUser']."'");
echo $i;
 ?>
