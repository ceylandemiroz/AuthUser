<?php
define("dbhost", "localhost");
define("dbuser", "root");
define("dbpass", "");
define("dbname", "");


$dsn = "mysql:dbname=".dbname.";host=" .dbhost;


try {
    
    $db = new PDO($dsn, dbuser, dbpass);

    //asurer d'envoyer des donnees en utf8
    $db->exec("SET NAMES utf8");

    //definir fetch par défault
    //constante object
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, 
    PDO::FETCH_ASSOC);


    //echo "connecté";

} catch (PDOException $e) {
    die("erreur:".$e->getMessage());
   }
?>