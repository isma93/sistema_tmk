<?php
if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif")) {
        $http_archive_path_request=$_SESSION['IMAGE_PATH'];
        $rut= "../../images/path_proc";
        $path=$rut.$http_archive_path_request;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $path."/".$_FILES['file']['name'])) {
        //more code here...
       
    } else {
        echo 0;
    }
} else {
    echo 0;
}
?>