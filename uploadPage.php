
<ul id="navigation">
    <li class="buttonLi" id="buttonLi1"><a class="uploadA" href="#page5">Files</a></li>
    <li class="buttonLi" id="buttonLi2"><a class="uploadA" href="#page6">Video</a></li>
    <li class="buttonLi" id="buttonLi3"><a class="uploadA" href="#page7">Music</a></li>
    <li class="buttonLi" id="buttonLi4"><a class="uploadA" href="#page8">Photo</a></li>
</ul>
<div class="clear"></div>
<div id="pageContent">
    <h2>
        Uplaod your files...</h2>
    <div id="fileUploader1">Upload</div>
</div>
<script src="js/jquery.uploadfile.min.js"></script>
<script>
    $("#fileUploader1").uploadFile({
        url: "uploadFile.php",
        allowedTypes: "txt,pdf,doc,zip",
        fileName: "myfile"
    });
</script>
