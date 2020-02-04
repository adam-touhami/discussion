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
<head>
<link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet">
</head>
<body>
<link rel="stylesheet" type="text/css" href ="index.css"/>
<title>Inscription</title>
<div class="en-tete">
<a href="index.php">Accueil</a> <a href="inscription.php">Inscription</a> <a href="connexion.php">Connexion</a> <a href="profil.php">Modifier profil</a> <a href="discussion.php">Discussion</a>
</div>
</div>
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