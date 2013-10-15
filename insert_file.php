 <?php
   $con = mysqli_connect("localhost","root","","files4u");
if(mysqli_connect_errno($con)>0)
    echo "connection error";
$i=mysqli_query($con,"insert into tb_collection (name,account_id,type) values('".$_POST['email']."','".$_POST['password']."')");
echo $i;
 ?>