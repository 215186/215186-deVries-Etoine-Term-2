<?php
include "FileDownload.php";
use Apfelbox\FileDownload\FileDownload;

if (isset($_POST['href'])) {
  $file = $_POST['href'];
  if ($_POST['mode'] == "download") echo download_file($file);
  else if ($_POST['mode'] == "remove") echo remove_file($file);
}

function download_file($file) {
  $file_name = basename($file);
  $fileDownload = FileDownload::createFromFilePath($file);
  $fileDownload->sendDownload($file_name);
}

function remove_file($file) {
  unlink($file);
  $message = "removed";
  header("Location: documents.php?message=$message");
}
?>
