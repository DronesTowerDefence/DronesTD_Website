<?php

//Session-(Cookies) sind auf Serverseite gespeicherte Daten, die nicht vom User ausgelesen werden können
//Normale Cookies sind unsicher im Browser zugänglich.
//Sessions müssen jedes Mal gestartet werden.
session_start();

$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);


if (!$check) {
    die("Bitte Hacken für Abmelden setzen");
}

//loggedIn ist der loggedIN Status, damit man sich nicht jedes Mal anmelden muss
//wird beim EInloggen auf 1 gesetzt
$_SESSION["loggedin"] = 0;
//Gespeicherte Seyssions werden gelöscht.
unset($_SESSION["username"]);
unset($_SESSION["email"]);

//Weiterleitung 
echo "
<script type=\"text/javascript\">

window.open('../index.html', '_self'); 

</script>
";