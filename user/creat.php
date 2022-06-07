<?php
session_start();

//verifie le formulaire a été envoyé
if (!empty($_POST)) {

    if (isset($_POST["username"], $_POST["email"],
     $_POST["pass"]) && !empty($_POST["username"]) && !empty($_POST["email"]) 
     && !empty($_POST["pass"]) 
     ){
      
      $pseudo = strip_tags($_POST["username"]);

      //control email
      if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
      {
          die("l'adresse email est incorrecte");
      }

      //hasher le mot de passe
      $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);
      //die($pass);
      
      //enregister en bdd
      require_once "../db/connectdb.php";

      $sql = "INSERT INTO `user` (`username`, `email`, `pass`,`role`) VALUES (:pseudo, :email, '$pass',
       '[\"ROLE_USER\"]')";

       $query = $db->prepare($sql);

       $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
       $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

       $query->execute();

       //id new user
       $id = $db->lastInsertId();

       //connecte user 

        $_SESSION["user"] = [
            "id" => $id,
            "pseudo" => $pseudo,
            "email" => $_POST["email"],
            "role" => ["ROLE_USER"]
        ];

     
     header("Location: login.php");
  
        
    }else {
        die("Vérifier le champs a été complet!");
    }
   // var_dump($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription</title>
</head>
<body>
<h1>Inscription</h1>
<form method="post">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="username">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="pass">Mot de passe</label>
        <input type="password" name="pass" id="pass">
    </div>
    <button type="submit"> Inscrire </button>
</form>
</body>
</html>