<?php

session_start();

$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);



if (!$check) {
    die("Bitte Hacken für Abmelden setzen");
}

//Datenbank-Infos
$host = "localhost:3306";
$dbname = "dronestd_account";
$username1 = "db_access";
$password = "aYOKWhS2lVntnAsB";

//Verbindung wird hergestellt
$conn = mysqli_connect($host, $username1, $password, $dbname);



if (mysqli_connect_errno()) {
    die("Verbindungsfehler: " . mysqli_connect_error() . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

$delEmail = $_SESSION["email"];

$sqlCheck = "DELETE FROM user_account WHERE email = $delEmail";

$result = $conn->query($sqlCheck);



echo $result;
print_r($result);
var_dump($result);

$_SESSION["loggedin"] = 0;
unset($_SESSION["username"]);
unset($_SESSION["email"]);


/*echo "
<script type=\"text/javascript\">

window.open('../index.html', '_self'); 

</script>
";*/

?>