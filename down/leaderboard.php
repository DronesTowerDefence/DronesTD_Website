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
  <br>


    <?php

    session_start();

    //Profilseite ohne loggedIN-Status nicht aufrufbar. (Softlock)
    if ($_SESSION["loggedin"] == 0) {

      die("Sie sind nicht angemeldet. <br> <br>
  <a href='https://www.dronestd.de/down/sign-in.php'>-><b>Startseite</b></a></p>");

    }

?>

</body>
</html>