<?php

session_start();
$con = mysqli_connect("localhost", "root", "mundjeff", "files4u");
if (mysqli_connect_errno($con) > 0)
    echo "connection error";
$rowSQL = mysqli_query($con, "SELECT * FROM tb_collections WHERE email='" . $_SESSION['currentUser'] . "' and type='" . $_POST['type'] . "'");
$divArray = array();
while ($row = mysqli_fetch_array($rowSQL)) {
    $div = '<li>' .
            '<div id="contentPageUlIn">' .
            '<div id="contentPageUlInLeft">' .
            '<br>' .
            '<br>' .
            $row['filename'] . '
                </div>' .
            '<div id="contentPageUlInRight">' .
            '<br>' .
            '<button id="' . $row['collection_id'] . '" class="downloadButton" onclick="downloadItems(this.id)">Download</button>' .
            '</div>' .
            '</div>' .
            '</li>';
    array_push($divArray, $div);
}
echo json_encode($divArray);
?>
