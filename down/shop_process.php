<?php
//Hier speicher ich die mit dem POST übergebenen Elemente in Variablen.
//Es gibt grundsätzlich 2  Arten, GET UND POST. Bei GET wird aber in der URL DAten mitgegeben, und das schickt sich bei Passwörtern nicht.
$username = $_GET["username"];
$amount = $_GET["amount"];

if($amount == 1){
    $add = 300;
}else if($amount == 2){
    $add = 800;
}if($amount == 5){
    $add = 2500;
}

echo $username ." ". $amount ." ". $add;

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
$sqlCheck = "UPDATE user_account SET coins = coins + '$add' WHERE username = '$username'";

$result = $conn->query($sqlCheck);

?>
