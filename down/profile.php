<!doctype html>
<html id="html" lang="de" class=dn>

  <head>
    <link rel="icon" href="img/icon.png">
    <meta charset="utf-8">
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="../stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae32d225a7.js"
      crossorigin="anonymous"></script>
    <title>Impressum</title>
  </head>

  <body>

    <h1>
      <b>Drones TD</b>
    </h1>

    
   
    

    <p>Dronenspaß für den Single- und Multiplayer!</p>

    <br>
    <hr>



    <div class="navbar">
      <a href="../index.html" style="background-color: #222222;"><i class="fa
          fa-home" aria-hidden="true"></i> &nbsp; Home</a>
    </div>
      <br>
      <body>














<?php



$encryption = $_COOKIE["user"];

$decryption_iv = '1234567891011121';
// Entschlüsselungsschlüssel
$decryption_key = "aylEwhyjpK2j21Ih1L";

$ciphering = "AES-128-CTR";

$decryption=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

$host = "localhost:3306";
$dbname = "dronestd_account";
$username1= "db_access";
$password = "aYOKWhS2lVntnAsB";

$conn = mysqli_connect($host, $username1, $password, $dbname);

if(mysqli_connect_errno())
{
    die("Verbindungsfehler: " . mysqli_connect_error() . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

//Checken nach Dopplungen

$sqlCheck = "SELECT username, email FROM user_account WHERE 
email = '$decryption'";
 
$result = $conn->query($sqlCheck);

if ($result->num_rows == 0)
{

  die("Username schon verwendet oder die Email ist bereits mit einem Account verknüpft!
  <br><br> Hier gehts zurück: 
  <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");

}

$row = $result->fetch_assoc()["username"];

echo "<h3> Profil <h3>
<br> <br>

<p> Nutzername: ". $row["username"] . "

<br> 

Email: " . $row["email"];

?>














</body>
</html>