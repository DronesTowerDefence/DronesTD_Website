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
    <br> <br>
</body>



<?php

$username = $_POST["username"];
$email = $_POST["email"];
$passwort = $_POST["passwort"];
$passwort2 = $_POST["passwort2"];
$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);

if (!$check) {
    die("<h1>Nutzungsbedingungen müssen angenommen werden!</h1> <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

if ($passwort != $passwort2) {
    die("<h1>Passwörter stimmen nicht überein</h1><br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

//var_dump($username, $email, $passwort, $passwort2, $check);

$host = "localhost:3306";
$dbname = "dronestd_account";
$username1 = "db_access";
$password = "aYOKWhS2lVntnAsB";

$conn = mysqli_connect($host, $username1, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Verbindungsfehler: " . mysqli_connect_error() . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

//Checken nach Dopplungen

$sqlCheck = "SELECT username, email FROM user_account WHERE 
email = '$email' OR username = '$username'";

$result = $conn->query($sqlCheck);

if ($result->num_rows > 0) {

    die("Username schon verwendet oder die Email ist bereits mit einem Account verknüpft!
    <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
    

}


//Eintragen der Daten

$sql = "INSERT INTO user_account(username, email, passwort) 
VALUES(?,?,?)";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {

    die(mysqli_error($conn) . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");

}

mysqli_stmt_bind_param(
    $stmt,
    "sss",
    $username,
    $email,
    $passwort
);

mysqli_stmt_execute($stmt);

$msg = "Ihr Account bei https://www.dronestd.de wurde erstellt! \n\n Sie können sich nun anmelden, etc.";

$msg = wordwrap($msg, 70);

mail($email, "Account Erstellt!",$msg);

echo "Ihr Account wurde erstellt!
<br><br> Hier gehts zur Anmeldung: 
<a href='https://www.dronestd.de/down/sign-in.php'>-><b>Startseite</b></a></p>";


$conn->close();

