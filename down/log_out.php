<?php

session_start();

$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);


if (!$check){
    die("Bitte Hacken für Abmelden setzen");
}

echo $_SESSION["username"];

session_destroy();

echo $_SESSION["username"];

if($_SESSION["username"]==null){
    echo "null";
}

session_unset["username"];

if($_SESSION["username"]==null){
    echo "null";
}

echo $_SESSION["username"];