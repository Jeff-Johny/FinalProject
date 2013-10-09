 <?php
   $con = mysqli_connect("localhost","root","mundjeff","files4u");
   $query = mysqli_query($con,"select * from tb_account where email = '".$_POST['email']."' and password = '".$_POST['password']."'");
   $i= mysqli_affected_rows($query);
	echo $i;
   mysqli_close($con);
?>
