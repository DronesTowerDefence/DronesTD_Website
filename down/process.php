<?php

$username = $_POST["username"];
$email = $_POST["email"];
$passwort = $_POST["passwort"];
$passwort2 = $_POST["passwort2"];
$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);

if(! $check){
    die("<h1>Nutzungsbedingungen müssen angenommen werden!</h1> <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

if($passwort != $passwort2){
    die("<h1>Passwörter stimmen nicht überein</h1><br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

//var_dump($username, $email, $passwort, $passwort2, $check);

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
email = '$email' OR username = '$username'";
 
$result = $conn->query($sqlCheck);

if ($result->num_rows > 0){

    die("Username schon verwendet oder die Email ist bereits mit einem Account verknüpft!
    <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");

}


//Eintragen der Daten

$sql = "INSERT INTO user_account(username, email, passwort) 
VALUES(?,?,?)";

$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt, $sql)){

    die(mysqli_error($conn) ."<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>" );

}

mysqli_stmt_bind_param($stmt, "sss", 
$username, $email, $passwort);

mysqli_stmt_execute($stmt);

echo "Yay!;";
