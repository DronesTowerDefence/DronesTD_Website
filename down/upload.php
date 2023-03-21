<?php
session_start();

$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = $_SESSION["username"] . '.' . end($temp);
//
$target_dir = "https://www.minigame.DronesTD.de/";
$target_file1 = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
$target_file = $target_dir . $newfilename . $imageFileType;
$uploadOk = 1;

// Bild?
/*if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {

    $uploadOk = 1;
  } else {

    $uploadOk = 0;
  }
}

// Größe des Bilds                    in Byte 
if ($_FILES["fileToUpload"]["size"] > 100000) {
  echo "Bild ist größer als 1000KB";
  $uploadOk = 0;
}*/

echo "Zielpfad: " . $target_file . "<br>";

// Falls obigen Abfragen null sind.
if ($uploadOk == 0) {
  echo " Die Datei wurde nicht hochgeladen. 
  <br><br> Hier gehts zum Profil zurück: 
  <a href='https://www.dronestd.de/down/profile.php'>-><b>Profil</b></a></p>";
  // Wenn alles ok ist, wird 
  
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file)) {
    echo "Die Datei" . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " wurde hochgeladen. <br><br> Hier gehts zum Profil zurück: 
    <a href='https://www.dronestd.de/down/profile.php'>-><b>Profil</b></a></p>"; //Special Char wegen Endungen und eventuellen Sonerzeichen
  } else {
    echo "Die Datei " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " wurde nicht hochgeladen. 
    <br><br> Hier gehts zum Profil zurück: 
    <a href='https://www.dronestd.de/down/profile.php'>-><b>Profil</b></a></p>";
  }
}
?>