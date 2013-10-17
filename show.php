<?php
session_start();
$con = mysqli_connect("localhost","root","mundjeff","files4u");
if(mysqli_connect_errno($con)>0)
echo "connection error";

$rowSQL = mysqli_query($con,"SELECT * FROM tb_collections WHERE email='".$_SESSION['currentUser']."' and type='".$_POST['type']."'");
//print_r($_SESSION['currentUser']);

$div_array = array();

while($row = mysqli_fetch_array($rowSQL)){
	$div = '<li>'.
            '<div id="content_page_ul_in">'.
		'<div id="content_page_ul_in_left">'.
                    '<br>'.
                    '<br>'.
                 $row['filename'].'
                </div>'.
                '<div id="content_page_ul_in_right">'.
                    '<br>'.
                    '<button id="'.$row['collection_id'].'" class="download_button" onclick="download_items(this.id)">Download</button>'.
                '</div>'.
	'</div>'.
'</li>';

	array_push($div_array, $div);
}


echo json_encode($div_array);

?>
