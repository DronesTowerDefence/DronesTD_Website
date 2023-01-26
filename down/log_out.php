<?php

session_start();

$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);


if (!$check){
    die("Bitte Hacken für Abmelden setzen");
}

session_unset();

echo "
<script type=\"text/javascript\">

window.open('../index.html', '_self'); 

</script>
";
