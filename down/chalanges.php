<!doctype html>
<!--Hier wird Standart-HTML Kram, der auf jeder Seite gleich ist, ausgeführt :)-->
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
    <br> <br>
</body>



<?php
//Hier speicher ich die mit dem POST übergebenen Elemente in Variablen.
//Es gibt grundsätzlich 2  Arten, GET UND POST. Bei GET wird aber in der URL DAten mitgegeben, und das schickt sich bei Passwörtern nicht.
$geld = $_POST["geld"];
$beginn = filter_input(INPUT_POST, "beginn", FILTER_VALIDATE_INT);
$ende = filter_input(INPUT_POST, "ende", FILTER_VALIDATE_INT);
$turm1_bool = filter_input(INPUT_POST, "turm1", FILTER_VALIDATE_BOOLEAN); //Hier filtere ich check (die normalerweise 1/0 wäre), in bool um (true/false)
$turm2_bool = filter_input(INPUT_POST, "turm2", FILTER_VALIDATE_BOOLEAN); //Hier filtere ich check (die normalerweise 1/0 wäre), in bool um (true/false)
$turm3_bool = filter_input(INPUT_POST, "turm3", FILTER_VALIDATE_BOOLEAN); //Hier filtere ich check (die normalerweise 1/0 wäre), in bool um (true/false)
$turm4_bool = filter_input(INPUT_POST, "turm4", FILTER_VALIDATE_BOOLEAN); //Hier filtere ich check (die normalerweise 1/0 wäre), in bool um (true/false)
$turm5_bool = filter_input(INPUT_POST, "turm5", FILTER_VALIDATE_BOOLEAN); //Hier filtere ich check (die normalerweise 1/0 wäre), in bool um (true/false)

$turm1 = $_POST["turm1"];
$turm2 = $_POST["turm2"];
$turm3 = $_POST["turm3"];
$turm4 = $_POST["turm4"];
$turm5 = $_POST["turm5"];

//Falls der Haken nicht angeklickt wurde
if (!$turm1_bool && !$turm2_bool && !$turm3_bool && !$turm3_bool && !$turm4_bool && !$turm5_bool) {
    die("<h1>Es muss mindestens ein Turm elaubt sein</h1> <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de/down/chalanges'>-><b>Zum creator</b></a></p>");
}
if ($ende > $beginn) {
    die("<h1>Es muss mindestens ein Turm elaubt sein</h1> <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de/down/chalanges'>-><b>Zum creator</b></a></p>");
}

$host = "localhost:3306"; //Datenbankdetails
$dbname = "dronestd_account";
$username1 = "db_access";
$password = "aYOKWhS2lVntnAsB";

$conn = mysqli_connect($host, $username1, $password, $dbname); //connection wird gespeichert

if (mysqli_connect_errno()) { //falls kaputt
    die("Verbindungsfehler: " . mysqli_connect_error() . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

//Abfrage wird als String gespeichert

//Eintragen der Daten

$sql = "INSERT INTO Aufgaben(Geld, RundeVon , RundeBis ,Turm1, Turm2 , Turm3 , Turm4 , Turm5  ) 
VALUES('$geld','$beginn','$ende' , '$turm1' , '$turm2' , '$turm3' , '$turm4' , '$turm5')";
//die Daten preisgeben soll) zu verhinder.

$conn->query($sqlCheck);

echo "Aufgabe Erstellt
<br><br> Hier gehts zur HomePage
<a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>";

//Schließen der Datenbank
$conn->close();