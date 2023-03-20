<!doctype html>
<!--Hier wird Standart-HTML Kram, der auf jeder Seite gleich ist, ausgeführt :)-->
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
    <br> <br>
</body>


<?php
//Hier speicher ich die mit dem POST übergebenen Elemente in Variablen.
//Es gibt grundsätzlich 2  Arten, GET UND POST. Bei GET wird aber in der URL DAten mitgegeben, und das schickt sich bei Passwörtern nicht.
$username = $_POST["username"];
$email = $_POST["email"];
$passwort = $_POST["passwort"];
$passwort2 = $_POST["passwort2"];
$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN); //Hier filtere ich check (die normalerweise 1/0 wäre), in bool um (true/false)

//Falls der Haken nicht angeklickt wurde
if (!$check) {
    die("<h1>Nutzungsbedingungen müssen angenommen werden!</h1> <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

//Falls die beiden Passwörter unterschiedlich sind
if ($passwort != $passwort2) {
    die("<h1>Passwörter stimmen nicht überein</h1><br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

//var_dump($username, $email, $passwort, $passwort2, $check); Testausgabe der übergebenen Attribute

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
$sqlCheck = "SELECT username, email FROM user_account WHERE 
email = '$email' OR username = '$username'";

//Abfrage wird durch query ausgeführt.
$result = $conn->query($sqlCheck);

//Wenn es 0 Spalten gibt, gibt es logischerweise keine Antwort, also gibt es keine doppelungen.
//Wenn größer als 0, doppeln sich email oder username, und das geht nicht.
if ($result->num_rows > 0) {

    die("Username schon verwendet oder die Email ist bereits mit einem Account verknüpft!
    <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");


}


//Eintragen der Daten

$sql = "INSERT INTO user_account(username, email, passwort) 
VALUES(?,?,?)"; // Die Fragezeichen sind Platzhalter, u

$stmt = mysqli_stmt_init($conn); //Zwischenschritt.

if (!mysqli_stmt_prepare($stmt, $sql)) { //Verbindung wird hier aufgebaur

    die(mysqli_error($conn) . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");

}

$p = password_hash($passwort,PASSWORD_DEFAULT);

mysqli_stmt_bind_param(
    //Hier werden die Platzhalter aufgefüllt
    $stmt,
    "sss",
    //sss für 3x String, die aufgefüllt werden
    $username,
    $email,
    $p
);

mysqli_stmt_execute($stmt); //Ausführen der Abfrage


echo "Ihr Account wurde erstellt!
<br><br> Hier gehts zur Anmeldung: 
<a href='https://www.dronestd.de/down/sign-in.php'>-><b>Startseite</b></a></p>";

//Schließen der Datenbank
$conn->close();

?>