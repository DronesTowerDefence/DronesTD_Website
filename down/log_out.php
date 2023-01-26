<?php

session_start();

$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);


if (!$check){
    die("Bitte Hacken für Abmelden setzen");
}

$_SESSION["loggedin"] = 0;
unset($_SESSION["username"]);
unset($_SESSION["email"]);


echo "
<script type=\"text/javascript\">

window.open('../index.html', '_self'); 

</script>
";
