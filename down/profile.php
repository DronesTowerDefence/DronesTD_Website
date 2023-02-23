
<!doctype html>
<html id="html" lang="de" class=dn>

<head>
  <link rel="icon" href="img/icon.png">
  <meta charset="utf-8">
  <link rel="stylesheet" href="../stylesheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/ae32d225a7.js" crossorigin="anonymous"></script>
  <title>Profil</title>
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


<?php
    echo "ok";
    session_start();

    //Profilseite ohne loggedIN-Status nicht aufrufbar. (Softlock)
    if ($_SESSION["loggedin"] == 0) {

      die("Sie sind nicht angemeldet. <br> <br>
  <a href='https://www.dronestd.de/down/sign-in.php'>-><b>Startseite</b></a></p>");

    }




//Bildname ist mit Username gespeichert. Da Sessions (Username ist dort gespeichert) nur mit PHP ausgelesen werden können,
//echost du die HTML-Anweisungen, und schiebst den Session-Username zwischen.
//Praktisch kann man mit PHP ganz einfach HTML echo'n und einschieben.
echo "ok";
echo "<h1> Profil </h1> <img src='http://www.dronesClient.DronesTD.de/"; 
echo $_SESSION["username"];
echo ".png' style='float:right;width:250px;height:250px;> '";
echo "OK";

//Db
$host = "localhost:3306"; //Datenbankdetails
$dbname = "dronestd_account";
$username1 = "db_access";
$password = "aYOKWhS2lVntnAsB";

$conn = mysqli_connect($host, $username1, $password, $dbname); //connection wird gespeichert

echo "ok";
if (mysqli_connect_errno()) { //falls kaputt
    die("Verbindungsfehler: " . mysqli_connect_error() . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}
echo "ok";

//Abfrage wird als String gespeichert
$sqlCheck ="SELECT achievementID, value FROM user_achievement AS ua JOIN user_account AS a ON ua.userID = a.userID WHERE a.username = 'Account'";

$result = $conn->query($sqlCheck);

for($i = '0'; $i < '5'; $i++){
echo "A";
$row = $result->fetch_assoc();
echo $row["ua.achievementID"] . " " . $row["ua.value"];
}


//Der Punkt ist das Äquivalent zum '+' bei Strings in C++, damit fügst du Sachen zusammen.
echo "
<br> 
Nutzername: <code>" . $_SESSION["username"] . " </code> 
<br> 
Email: <code>" . $_SESSION["email"] . "</code>
<br> 
<br>
<h2> Statistiken: </h2>
<br>
<br> 

";
/*//1Drohnen;2TürmePlatziert;3Geld;5Siege;6Matches;7Multiplayer*/
?>
 
<br>
<br>
<br>
<br>
<br>
<br>
<br>



<!--Soll rechts unter dem Bild sein-->
<div id = rechts style="float:right;">
  <!--Datei wird hier uploadet/angenommen-->
  <form action="upload.php" method="post" enctype="multipart/form-data">
  Profilbild auswählen: (unter 1000KB) <br>
  Nur PNG!!!
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
  </form>
  </div>

  
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
    <!--Abmelden PHP wird aufgerufen-->
    <form action='log_out.php' method='post'>
      <br>
      <label>
        <input type='checkbox' name='check' required>
        Wirklich abmelden?
      </label>
      &emsp;
      <button><p style="color: red">Abmelden</button>
    </form>

    <!--Delete Account PHP wird aufgerufen-->
    <form action='deleteAcc.php' method='post'>
      <br>
      <label>
        <input type='checkbox' name='check' required>
        Wirklich irreversibel löschen?
      </label>
      &emsp;
      <button><p style="color: red">Löschen</button>
    </form>
    <br>
    <hr>
    <br>
    <form action='updatePassword.php' method='post'>
      <br>
      <label>
        <input type='checkbox' name='check' required>
        Wirklich Passwort ändern?
      </label>
      <br>
      <label for="new_name">Neues Passwort:</label>
    <input type="password" id="new_name" name="new_name" required maxlength="18" placeholder="Max 18">
    
      <button><p style="color: red">Ändern</button>
  </form>

    <br>

  
  </body>

</html>