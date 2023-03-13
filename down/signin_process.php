<?php

session_start();

$email = $_POST["email"];
$passwort = $_POST["passwort"];


//Datenbank-Infos
$host = "localhost:3306";
$dbname = "dronestd_account";
$username1 = "db_access";
$password = "aYOKWhS2lVntnAsB";

//Connection wird gespeichert
$conn = mysqli_connect($host, $username1, $password, $dbname);



if (mysqli_connect_errno()) {
    die("Verbindungsfehler: " . mysqli_connect_error() . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

//Checkt nach eingegebene AnmeldeDaten

$sqlCheck = "SELECT username, email, passwort FROM user_account WHERE 
email = '$email'";

$result = $conn->query($sqlCheck);


//Wenn keine Ergebnisse, Anmeldedaten falsch
if ($result->num_rows == 0) {

    die("Anmeldedaten sind falsch!
    <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de/down/sign-in.php'>-><b>Anmeldung</b></a></p>");

}
//fetch_assoc übergibt die erste Spalte.(in einer Forshcleife geht es automatisch zur nächsten Spalte bei jedem Aufruf,
//aber da wir nur einen User mit den Daten haben, gibt es nur einen Aufruf)
//Nun können wir mit nennen des Attributnamen der DB den Inhalt in $row zwischenspeichern
$row = $result->fetch_assoc();
//! hätte auch gereicht, 
if(password_verify($passwort, $row["passwort"])){
    

    $username = $row["username"];
    $admin = $row["admin"];
    
    //Sessions werden gesetzt für einfache Verwendung in Zukunft, (damit nicht auf jeder Seite eine sql-Abfrage gemacht werden muss)
    
    $_SESSION["email"] = $email;
    $_SESSION["username"] = $username;
    $_SESSION["loggedin"] = 1; //eingeloggt-Status
    $_SESSION["admin"] = $admin;
    
    //JavaScript weiterleitung
    echo "
    <script type=\"text/javascript\">
    
    window.open('profile.php', '_self'); 
    
    </script>
    ";
    
    //Schließen der Datenbbank
    $conn->close();
}else{
    die("Passwort stimmt nicht überein!
    <br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de/down/sign-in.php'>-><b>Anmeldung</b></a></p>");
}


?>
