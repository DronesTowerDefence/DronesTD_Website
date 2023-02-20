<!doctype html>
<html id="html" lang="de" class=dn>

<head>
  <link rel="icon" href="img/icon.png">
  <meta charset="utf-8">
  <link rel="stylesheet" href="../stylesheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/ae32d225a7.js" crossorigin="anonymous"></script>
  <title>Aufgaben</title>
</head>

<?php

session_start();

if (!isset($_SESSION["loggedin"])) {

  echo " 
  <script type=\"text/javascript\">
  
  window.open('sign-in.php', '_self'); 
  
  </script>
  ";
}
if ($_SESSION["loggedin"] != "1") {
  echo " 
  <script type=\"text/javascript\">
  
  window.open('sign-in.php', '_self'); 
  
  </script>
  ";
}
if (!isset($_SESSION["admin"])) {

  echo "nicht erlaubt, da du kein Admin bist ";
}
if ($_SESSION["admin"] != "1") {
  echo "nicht erlaubt, da du kein Admin bist";
}


?>

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
    <br>

    <p>


    <h3>Aufgaben erstellen:</h3>
    <br>
    <!--Methode POST zur Process PHP für Abfragen-->
    <p>
      Hier kannst du eine Aufgabe erstellen!
      Gebe an, in welcher Runde die Aufgabe startet und in welcher sie endet.
      Außerdem kannst du Tower sperren und festlegen, wieviel Geld dem Spieler zu beginn der Aufgabe zu verfügung stehen
    </p>
    <form action="chalanges_proccess.php" method="post">
      <label for="geld">Geld:</label>
      <input type="number" id="geld" name="geld" required placeholder="1000">

      <label for="beginn">startet ab Runde:</label>
      <input type="number" id="beginn" name="beginn" required maxlength="2" placeholder="1-100">

      <label for="ende">endet in Runde:</label>
      <input type="number" id="ende" name="ende" required maxlength="2" placeholder="1-100">

      <label for="ende">Hier kannst du die karte für die Aufgabe festlegen:</label>
      <input type="number" id="karte" name="karte" required maxlength="1" placeholder="1-100">

      <br> <label for="leben">Gebe an, wieviele Leben man haben soll</label>
      <input type="number" id="leben" name="leben" required maxlength="3" placeholder="1-100">
      <br>
      <label>
        <input type="checkbox" name="turm1">
        Turm 1 erlaubt
      </label> <br>
      <label>
        <input type="checkbox" name="turm2">
        Turm 2 erlaubt
      </label> <br>
      <label>
        <input type="checkbox" name="turm3">
        Turm 3 erlaubt
      </label> <br>
      <label>
        <input type="checkbox" name="turm4">
        Turm 4 erlaubt
      </label> <br>
      <label>
        <input type="checkbox" name="turm5">
        Turm 5 erlaubt
      </label> <br>
      <br>
      <br>
      <button>Senden</button>
    </form>


    </p>


  </body>