<?php

  $nameFile =  date('Ymdhs');
  $path  = "upload/";
  $successUpload = false;

  $fileUploadName = strtolower(basename($_FILES["file"]["name"]));
  $fileUploadExt  = pathinfo($fileUploadName,PATHINFO_EXTENSION);


  if($fileUploadExt != "jpg" && $fileUploadExt != "png" && $fileUploadExt != "jpeg" && $fileUploadExt != "gif" ) {
    $msn = "El archivo debe ser Imagen o Mp3";
    $successUpload = false;
  }else{
    $successUpload = true;
  }


  if($_FILES["file"]["size"] > 16777216){
    $msn = "Ooops! tu imagen no puede superar mas de 2MB";
    $successUpload = false;
  }

  if($successUpload == true){
    $file = $path. $nameFile .".". $fileUploadExt; 
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {
        $msn = "El archivo  se subio correctamente.  <br>";
    } else {
      $msn .= "Ocurrio un error";
    }
  }


 echo $msn;
?>
