<?php
require_once "db/connectdb.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>
    <h1>Hello!</h1>

    <nav>
        <ul>
            <?php  if (!isset($_SESSION["user"])): ?>
            <li><a href="./user/login.php"> Connection</a></li>
            <li><a href="./user/creat.php"> Inscription</a></li>

            <?php else: ?>
            <li><a href="logout.php"> Déconnection</a> </li>

        <?php endif; ?>
        </ul>
    </nav>
</body>
</html>