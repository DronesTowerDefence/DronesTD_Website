<?php

session_start();

//Profilseite ohne loggedIN-Status nicht aufrufbar. (Softlock)
if ($_SESSION["loggedin"] == 0) {

  die("Sie sind nicht angemeldet. <br> <br>
<a href='https://www.dronestd.de/down/sign-in.php'>-><b>Startseite</b></a></p>");

}
?>

<script>
  Cache - Control: no - cache, must - revalidate
  Cache - Control: no - store
</script>

<!doctype html>
<html id="html" lang="de" class=dn>

<head>
  <link rel="icon" href="../img/icon.ico">
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

  $host = "localhost:3306"; //Datenbankdetails
  $dbname = "dronestd_account";
  $username1 = "db_access";
  $password = "aYOKWhS2lVntnAsB";
  $conn = mysqli_connect($host, $username1, $password, $dbname); //connection wird gespeichert
  if (mysqli_connect_errno()) { //falls kaputt
  die("Verbindungsfehler: " . mysqli_connect_error() . "<br><br> Hier gehts zurück: 
  <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
  }
  $sqlCheck = "SELECT coins FROM user_account WHERE username = '$_SESSION[username]'";
  $result = $conn->query($sqlCheck);
  $row = $result->fetch_assoc();


  //Bildname ist mit Username gespeichert. Da Sessions (Username ist dort gespeichert) nur mit PHP ausgelesen werden können,
//echost du die HTML-Anweisungen, und schiebst den Session-Username zwischen.
//Praktisch kann man mit PHP ganz einfach HTML echo'n und einschieben.
  
  echo "<h1> Profil </h1> <img src='http://www.client.DronesTD.de/";
  echo $_SESSION["username"];
  echo ".png' style='float:right;width:250px;height:250px;> '";
  echo "<br>";

  //Db
  
  //Abfrage wird als String gespeichert
  
  //Der Punkt ist das Äquivalent zum '+' bei Strings in C++, damit fügst du Sachen zusammen.
  echo "
<br> 
Nutzername: <code>" . $_SESSION["username"] . " </code> 
<br> 
Email: <code>" . $_SESSION["email"] . "</code>
<br> 
Coins: <code>" . $row["coins"] . "</code>
<br>
<br>
<br>
<br>

";


  ?>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>



  <!--Soll rechts unter dem Bild sein-->
  <div id=rechts style="float:right;">
    <!--Datei wird hier uploadet/angenommen-->
    <form action="upload.php" method="post" enctype="multipart/form-data">
      Profilbild auswählen: (unter 1000KB) <br>
      Nur PNG!!!
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
  </div>

<!--ok-->
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
 
  <!--Abmelden PHP wird aufgerufen-->
  <div id=links style="float:left;">
  <form action='log_out.php' method='post'>
    <br>
    <button>
    Abmelden
    </button>
  </form>
</div>
  <!--Delete Account PHP wird aufgerufen-->
  <div id=rechts style="float:right;">
  <form action='deleteAcc.php' method='post'>
    
    <button>
     Löschen
    </button>
    <label>
     <input type='checkbox' name='check' required>
      Wirklich irreversibel löschen?
    </label> 
  </form>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <hr>
  <form action='updatePassword.php' method='post'>
    <br>
    
    <br>
    <label for="new_name">Neues Passwort:</label>
    <label>
      <input type='checkbox' name='check' required>
      Wirklich Passwort ändern?
    </label>
    <input type="password" id="new_name" name="new_name" required maxlength="18" placeholder="Max 18">

    <button>
    Ändern
    </button>
  </form>

  <br>


</body>

</html>