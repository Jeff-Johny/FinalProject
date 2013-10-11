 <?php
   $con = mysqli_connect("localhost","root","mundjeff","files4u");


$result = mysqli_query($con,"SELECT account_id FROM tb_account where email='".$_POST['email']."' and password='".$_POST['password']."'");
	
$row = mysqli_fetch_array($result);
echo $row;
//echo $row;
/*if( $row > '0')
{
echo '1';
}
else
echo '';*/

   mysqli_close($con);
   
?>
