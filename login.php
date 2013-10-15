<?php
session_start();
   $con = mysqli_connect("localhost","root","mundjeff","files4u");
if(mysqli_connect_errno($con)>0)
echo "connection error";

$query = mysqli_query($con,"SELECT * FROM tb_account where email='".$_POST['email']."' and password='".$_POST['password']."'");
$count = mysqli_affected_rows($con);
 $row = mysqli_fetch_array($query);
if($count){
     $_SESSION['currentUser'] = $row['email'];
     echo $row;
 }
 else
     echo "failure";


   mysqli_close($con);
   
?>
