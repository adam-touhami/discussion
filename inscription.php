<?php
$connexion=mysqli_connect("localhost","root","","discussion");



if (!empty($_POST['Valider']))
{
    if(!empty($_POST['login']) AND !empty($_POST['password']) AND !empty($_POST['password2']))
    {

  
   
 
            if($_POST['password']  == $_POST['password2'])
            {    $blocklogin = htmlspecialchars($_POST['login']);
                $blockpass = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);
                
                $veriflogin= "SELECT login FROM utilisateurs where login='".$_POST['login']."'";
                
                  
                 $requete= mysqli_query($connexion,$veriflogin);
                $affichage= mysqli_num_rows($requete);
                var_dump($affichage);

                    if($affichage==0)
                     {
                    
                        
                
        
               
                $inserer= ("INSERT INTO `utilisateurs`( `login`, `password`) VALUES ('$blocklogin','$blockpass')");
                $requete= mysqli_query($connexion,$inserer);
               
             
                  }
                  else{
                    echo " L'utilisateur existe déjà !";
                }  
            }
            else{

                echo "Les mots de passe ne correspondent pas !";
            }
       
        
     }
        else
          {
          echo"Tout les champs doivent être remplis !";
        }
   
}


?>


<html>
<body>
<link rel="stylesheet" type="text/css" href ="connexion.css"/>
<title>Livre d'or</title>
        <div class="topnav">
<a href="commentaire.php">Ajouter un commentaire</a>
  <a href="profil.php">Profil</a>
  <a href="connexion.php">Connexion</a>
  <a href="accueil.php">Accueil</a>
</div>
</div>
<p class="titre1">Discussion : Inscription</p>
<section id="adam">
<form action="inscription.php" method="post">
<div class="dispositon">
<p>Login:</p><input required type="text" name="login">
<br><p>Password:</p><input required type="password" name="password">
<br><p>Confirm Password:</p><input  required type="password" name="password2"></br>
<input type="submit" name="Valider"><br>
</form></div>
</section>


</body>


</html>