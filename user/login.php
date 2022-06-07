<?php
session_start();


if (!empty($_POST)) {

    if (isset($_POST["email"], $_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"]))
    {
        
        
        //email control
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die ("email non valid");
        }
       
       //connected bdd
       require_once "../db/connectdb.php";

       $sql = "SELECT * FROM `user` WHERE `email`= :email";

       $query = $db->prepare($sql);

       $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

       $query->execute();

       $user = $query->fetch();

      if(!$user){
        die("email ou le mot de passe est invalide ");  
      }

      //si user existe verifier le mdp
      if(!password_verify($_POST["pass"], $user["pass"]))
      {
          die("email ou le mot de passe est invalide ");
      }

      
       

       $_SESSION["user"] = [
           "id" => $user["id"],
           "pseudo" => $user["username"],
           "email" => $user["email"],
           "role" => $user["role"]
       ];
    //rediriger le page
    header("Location: account.php");

    }

}
?>

<h1>connexion</h1>
<form method="post">
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="pass">Mot de passe</label>
        <input type="password" name="pass" id="pass">
    </div>
    <button type="submit"> connecter</button>
</form>