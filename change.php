<?php

session_start();
$con = mysqli_connect("localhost", "root", "mundjeff", "files4u");
if (mysqli_connect_errno($con) > 0)
    echo "connection error";
$query = mysqli_query($con, "SELECT * FROM tb_account where email='" . $_SESSION['currentUser'] . "'");
$count = mysqli_affected_rows($con);
$row = mysqli_fetch_array($query);
if ($count) {
    if ($row['password'] === $_POST['currentPasswordCheck']) {
        $i = mysqli_query($con, "update tb_account set password='" . $_POST['password'] . "' where email='" . $_SESSION['currentUser'] . "'");
        echo 'Your password changed successfully!!!';
    } else {
        echo 'Invalid password';
    }
}
?>
