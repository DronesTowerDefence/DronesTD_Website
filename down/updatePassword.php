<?php


session_start();


$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);
$new_name = $_POST["new_name"];


if (!$check) {
    die("Bitte Hacken für Abmelden setzen");
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
$sqlCheck = "UPDATE user_account SET passwort = '$new_name' WHERE username = '$_SESSION[username]'";

$result = $conn->query($sqlCheck);


$_SESSION["loggedin"] = 0;
//Gespeicherte Seyssions werden gelöscht.
unset($_SESSION["username"]);
unset($_SESSION["email"]);


//Weiterleitung 
echo "
 <script type=\"text/javascript\">
 
 window.open('../index.html', '_self'); 
 
 </script>";


?>