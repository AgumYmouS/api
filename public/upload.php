<?php
  $target_dir = "./upload/";
  $target_file_name = $target_dir .basename($_FILES["file"]["name"]);
  $response = array();

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_FILES["file"])){
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)){
        $success = true;
        $message = "Berhasil";
      }else {
        $success = false;
        $message = "Gagal";
      }
  }else {
      $success = false;
      $message = "Error";
  }
  }else {
      $success = false;
      $message = "Not Valid";
  }

  $response["success"] = $success;
  $response["messsage"] = $message;
  echo json_encode($response);
?>
