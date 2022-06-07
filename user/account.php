<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espace membre</title>
</head>
<body>
    <h1>Bonjour <?= $_SESSION["user"]["pseudo"] ?>!</h1>

    <section>
        <ul>
          <li><a href="logout.php"> Déconnection</a> </li>  
        </ul>
    </section>
    

</body>
</html>