<?php
//Hier speicher ich die mit dem POST übergebenen Elemente in Variablen.
//Es gibt grundsätzlich 2  Arten, GET UND POST. Bei GET wird aber in der URL DAten mitgegeben, und das schickt sich bei Passwörtern nicht.
$username = $_POST["username"];
$amount = $_POST["amount"];


echo $username . $amount;