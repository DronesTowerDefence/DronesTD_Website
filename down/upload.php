
<?php
session_start();
/*$temp1 = $_SESSION["username"];
mkdir("uploads/". $temp1 ."", 0700);*/
$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = $_SESSION["username"]  . '.' . end($temp);
//
$target_dir = "../../../dronesClient.DronesTD.de/";
$target_file1 = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
$target_file = $target_dir . $newfilename . $imageFileType;
$uploadOk = 1;


// Bild?
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    
    $uploadOk = 1;
  } else {
    
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
  echo " Die Datei wurde nicht hochgeladen. 
  <br><br> Hier gehts zum Profil zurück: 
  <a href='https://www.dronestd.de/down/profile.php'>-><b>Profil</b></a></p>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Die Datei ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " wurde hochgeladen. <br><br> Hier gehts zum Profil zurück: 
    <a href='https://www.dronestd.de/down/profile.php'>-><b>Profil</b></a></p>"; //Special Char wegen Endungen und eventuellen Sonerzeichen
  } else {
    echo "Die Datei wurde nicht hochgeladen. 
    <br><br> Hier gehts zum Profil zurück: 
    <a href='https://www.dronestd.de/down/profile.php'>-><b>Profil</b></a></p>";
  }
}
?>
