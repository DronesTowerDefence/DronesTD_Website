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
$geld = filter_input(INPUT_POST, "geld", FILTER_VALIDATE_INT);
$beginn = filter_input(INPUT_POST, "beginn", FILTER_VALIDATE_INT);
$ende = filter_input(INPUT_POST, "ende", FILTER_VALIDATE_INT);
$leben = filter_input(INPUT_POST, "leben", FILTER_VALIDATE_INT);
$karte = filter_input(INPUT_POST, "karte", FILTER_VALIDATE_INT);
$turm1 = $_POST["turm1"];
$turm2 = $_POST["turm2"];
$turm3 = $_POST["turm3"];
$turm4 = $_POST["turm4"];
$turm5 = $_POST["turm5"];
$turm5 = $_POST["turm6"];



//Falls der Haken nicht angeklickt wurde
if ($turm1 == '' && $turm2 == '' && $turm3 == '' && $turm4 == '' && $turm5 == '' && $$turm6 == '') {
    die("<h1>Fehler: Es muss mindestens ein Turm elaubt sein</h1> <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de/down/chalanges.html'>-><b>Zum creator</b></a></p>");
}
if ($ende < $beginn) {
    die("<h1>Fehler: Die Endrunde muss gleich oder größer als der Startrunde sein</h1> <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de/down/chalanges.html'>-><b>Zum creator</b></a></p>");
}

if ($karte<1 || karte >4)
{
     die("<h1>Fehler: Gib eine gültige Kartennummer ein</h1> <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de/down/chalanges.html'>-><b>Zum creator</b></a></p>");
}

$t1 = 0;
$t2 = 0;
$t3 = 0;
$t4 = 0;
$t5 = 0;
$t6 = 0;
if ($turm1 == 'on')
    $t1 = 1;
if ($turm2 == 'on')
    $t2 = 1;
if ($turm3 == 'on')
    $t3 = 1;
if ($turm4 == 'on')
    $t4 = 1;
if ($turm5 == 'on')
    $t5 = 1;
if ($turm6 == 'on')
    $t6 = 1;

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

$sql = "INSERT INTO Aufgaben(Geld, RundeVon , RundeBis ,Leben, Karte ,Turm1, Turm2 , Turm3 , Turm4 , Turm5  ) 
VALUES('$geld','$beginn','$ende' ,'$leben' ,'$karte' ,  '$t1' , '$t2' , '$t3' , '$t4' , '$t5' , '$t6')";
//die Daten preisgeben soll) zu verhinder.

$conn->query($sql);

echo "Aufgabe Erstellt
<br><br> Hier gehts zur HomePage
<a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>";

//Schließen der Datenbank
$conn->close();