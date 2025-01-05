<?php

session_start();
if($_SESSION["verify"] != "FileManager4TinyMCE") die('forbiden');
include 'config.php';
include('utils.php');

$path=$_POST['path'];
$path_thumbs=$_POST['path_thumb'];

if(strpos($path,$upload_dir)===FALSE || strpos($path_thumbs,'thumb')!==0) die('wrong path');

unlink($root.$path);
unlink($path_thumbs);

?>
