<?php

$con = mysqli_connect("localhost", "root", "mundjeff", "files4u");
if (mysqli_connect_errno($con) > 0)
    echo "connection error";
$i = mysqli_query($con, "insert into tb_account (name,email,password) values('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "')");
echo $i;
?>
