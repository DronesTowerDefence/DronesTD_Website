
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Bild?
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Datei ist ein Bild - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Datei ist kein Bild";
    $uploadOk = 0;
  }
}

// Größe des Bilds                    in Byte 
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Bild ist größer als 500KB";
  $uploadOk = 0;
}

//Bildformate :)
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Nur JPG, JPEG, PNG & GIF files sind erlaubt.";
  $uploadOk = 0;
}*/

// Falls obigen Abfragen null sind.
if ($uploadOk == 0) {
  echo "Die Datei wurde nicht hochgeladen.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Die Datei ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " wurde hochgeladen."; //Special Char wegen Endungen und eventuellen Sonerzeichen
  } else {
    echo "Die Datei wurde nicht hochgeladen.";
  }
}
?>
