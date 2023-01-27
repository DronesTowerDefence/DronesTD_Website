<?php

$host = "127.0.0.1";
$port = 5353;
set_time_limit(0);

$socket = socket_create(AF_INET, SOCK_STREAM, 0);

if(socket_clear_error()){
    echo "Kaputt";
}

//Binden von Socket an Port
$result = socket_bind($socket, $host, $port);

//Wartet auf die Connection
$result = socket_listen($socket, 3);

$spawn = socket_accept($socket);


$input = socket_read($spawn, 1024);

//rÜCKSENDUNG
$nachricht = "ok";

socket_write($spawn, $ok, strlen(2));

//CLOSE
socket_close($spawn);
socket_close($socket);


//db connection
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
email = '' AND username = ''";

$result = $conn->query($sqlCheck);






?>