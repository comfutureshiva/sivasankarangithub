<?php
include "connectdb.php";

$filename = $_REQUEST["file"];
$usermail = $_REQUEST["email"];
$dir = "../upload/";

if(isset($filename))
{
	$file = $dir.$filename;
	$content = fopen($file);
	header("Expires: 0");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Content-type: aapplication/msword; charset:UTF-8");
	header("Pragma: no-cache");
	header('Content-length: '.strlen($content));
    header("Content-length: ".filesize($file));
	header('Content-disposition: attachment; filename='.basename($file));
    readfile("$file");
	echo "['true', 'true', 'openDocument($file)']";
}
else
{
	echo "No File Selected";
}
?>