<?php
global $bdd;
if(isset($_POST['submit'])) {
    
$nom =  htmlspecialchars($_POST['nom']);
$prenom =  htmlspecialchars($_POST['prenom']);
$email =  htmlspecialchars($_POST['email']);
$mdp =  sha1(htmlspecialchars($_POST['mdp']));
$niveau =  0;


if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $email)){
  $email_verif = 'ok';
}
else{
  $email_verif = 'invalide';
}

if($email_verif == 'invalide'){
  echo "email invalide";
  //<meta http-equiv="refresh" content="0; url=http://www.votre-site.fr/newsletter.html" />
}

if($email_verif == 'ok'){
 // Verification de l'email eMail - Est-elle deja enregistrer ????
 $email_nouvelle = "SELECT id_u FROM users WHERE email='".$email."'";
 $resultat = $bdd->prepare($email_nouvelle);
 $resultat->execute();
 $nombre_email = $resultat->rowCount();

 if($nombre_email < 1){
   // Enregistrement de l'email mail dans la base de donnees Mail
   $req_insert_user = $bdd->prepare("INSERT INTO users(nom, prenom, mdp, email, niveau) VALUES(:nom, :prenom, :mdp, :email, :niveau)");
   $req_insert_user->bindValue(':nom', $nom, PDO::PARAM_STR);
   $req_insert_user->bindValue(':prenom', $prenom, PDO::PARAM_STR);
   $req_insert_user->bindValue(':mdp', $mdp, PDO::PARAM_STR);
   $req_insert_user->bindValue(':email', $email, PDO::PARAM_STR);
   $req_insert_user->bindValue(':niveau', $niveau, PDO::PARAM_INT);
   $req_insert_user->execute();
   header("location:login");

 }
}
}
?>
