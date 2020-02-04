<?php
if(isset($_POST['Valider']))
{

$user=htmlspecialchars(trim($_POST['login']));
$pass=htmlspecialchars(trim($_POST['password']));

$base=mysqli_connect("localhost","root","","discussion");
$req= "SELECT * FROM utilisateurs WHERE login='$user'";
$result= mysqli_query($base,$req);
$row= mysqli_fetch_array($result);


  if(password_verify($_POST['password'],$row['password']))
  {
    session_start();
      echo 'Vous êtes connecté ', $user . ' !';
      $_SESSION['login']=$user;
      $_SESSION['password']=$pass;
      header('Location: index.php');
  }
  else
  {
    echo 'Login ou password incorrect';
  }
}

?>
<html>
    <body>
        <title>Livre d'or</title>
       <header> <div class="topnav">
  <a  href="discussion.php">Discussion</a>
  <a href="inscription.php">Inscription</a>

  
</div></header>
</div>
<p class="titre1">Discussion : Connexion</p>
        
        <section id="adam">
<link rel="stylesheet" type="text/css" href ="connexion.css"/>
<div class="dispositon">
<form class="form1" action="" method="post">
<p>Login:</p> <input  required type="text" name="login">
<p>Password:</p><input required type ="password" name="password">
<input required class="button" type="submit" name="Valider"> 
</div>
</section>

</body> 