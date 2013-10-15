<?php
$con = mysqli_connect("localhost","root","mundjeff","files4u");
if(mysqli_connect_errno($con)>0)
echo "connection error";

$rowSQL = mysqli_query($con,"SELECT * FROM tb_collections");


$div_array = array();

while($row = mysqli_fetch_array($rowSQL)){
	$div = '<li>'.
            '<div id="content_page_ul_in">'.
		'<div id="content_page_ul_in_left">'.
                    '<br>'.
                    '<br>'.
                    '<input type="radio" value="'.$row['collection_id'].'" name="download_type">'.
                 $row['filename'].'
                </div>'.
                '<div id="content_page_ul_in_right">'.
                    '<br>'.
                    '<button id="download_button" >Download</button>'.
                '</div>'.
	'</div>'.
'</li>';

	array_push($div_array, $div);
}


/*for($i=0;$i<sizeof($filenames);$i++){
$div = '<div id="content_page_ul_in_left">
                    <br>'.
                    '<br>'.
                    '<input type="radio" value="radio_1" name="download_type">'.
                 $filenames[$i].'
                </div>'.
                '<div id="content_page_ul_in_right">'.
                    '<br>'.
                    '<button id="download_button">Download</button>'.
                '</div>';

array_push($div_array, $div);
}*/

echo json_encode($div_array);






?>
