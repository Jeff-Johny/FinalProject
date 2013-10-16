<?php
session_start();
$con = mysqli_connect("localhost","root","mundjeff","files4u");
if(mysqli_connect_errno($con)>0)
echo "connection error";

$output_dir = "profile_pic/";
if(isset($_FILES["myfile"]))
{
	$ret = array();
	$error =$_FILES["myfile"]["error"];
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
 	 	$fileName = $_FILES["myfile"]["name"];
 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $_FILES["myfile"]["name"]);
                $ret[$fileName]= $output_dir.$fileName;
		
		
	}
	else
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $_FILES["myfile"]["name"][$i];
	  	$ret[$fileName]= $output_dir.$fileName;
		move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName );
	  }
	$i=mysqli_query($con,"update tb_account set prof_pic='$fileName' where email='".$_SESSION['currentUser']."'");
		echo $i;
	
	}
    echo json_encode($ret);
 }
 ?>
