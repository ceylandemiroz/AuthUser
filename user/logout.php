<?php
session_start();
//delete var
unset($_SESSION["user"]);

header("Location: ../index.php");
?>