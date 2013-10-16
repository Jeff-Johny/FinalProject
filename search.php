<?php
$con = mysqli_connect("localhost","root","mundjeff","files4u");
if(mysqli_connect_errno($con)>0)
echo "connection error";
$rowSQL = mysqli_query($con,"SELECT * FROM tb_collections WHERE filename LIKE '%".$_POST['filename']."%'");
$row = mysqli_fetch_array($rowSQL);
echo $row['filename'];
?>
