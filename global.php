<?php
$UPLOAD_URL = "../content/img/product/";
function save_file($fielldname, $target_dir)
{
    $file_uploaded = $_FILES[$fielldname];
    $file_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}
?>