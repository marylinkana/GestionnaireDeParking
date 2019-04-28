<?php
class User {

  public function __construct(){
  }

  public function getListUser()
  {
      global $bdd;
      $req = $bdd->query("SELECT * FROM users where niveau = 1 OR niveau = 2");
      return $req;
  }

  public function getListInscrit()
  {
      global $bdd;
      $req = $bdd->query("SELECT * FROM users where niveau = 0 OR niveau = -1");
      return $req;
  }

  public function getInscAValiser()
  {
      global $bdd;
      $req = $bdd->query("SELECT * FROM users where niveau = 0");
      return $req;
  }

  public function getUserbannis()
  {
      global $bdd;
      $req = $bdd->query("SELECT * FROM users where niveau = -1");
      return $req;
  }



  public function getListInscritRecherche($recherche)
  {
    global $bdd;
    $req = $bdd->query("SELECT * FROM users where  niveau != 1 AND niveau != 2 AND nom_u = '$recherche' OR prenom = '$recherche' ");
    return $req;
  }

  public function getListUserRecherche($recherche)
  {
    global $bdd;
    $req = $bdd->query("SELECT * FROM users where  niveau != -1 AND niveau != 0 AND nom_u = '$recherche' OR prenom = '$recherche' ");
    return $req;
  }

  public function getRankUser($id_u)
    {
      global $bdd;
      $req = $bdd->query("SELECT * FROM users where id_u = $id_u AND rang != 0");
      return $req;
    }

  public function changeRang()
  {
    global $bdd;
    $changeRang = $bdd->query("UPDATE users SET rang = rang - 1  WHERE rang >= 2");
    return $changeRang->fetch();
  }

  public function resetRang($id_u)
  {
    global $bdd;
    $resetRang = $bdd->prepare("UPDATE users SET rang = 0 WHERE id_u =".$id_u);
    return $resetRang->execute();
  }

   public function valideInsc($id_u)
  {
      global $bdd;
      $req = $bdd->prepare("UPDATE users SET niveau = 1 WHERE id_u = :id_u");
      $req->bindValue(':id_u', $id_u,  PDO::PARAM_INT);
      $req->execute();
      header('Location:inscription');
      return $req->fetch();
  }

  public function annuleInsc($id_u)
  {
      global $bdd;
      $req = $bdd->prepare("UPDATE users SET niveau = -1 WHERE id_u = :id_u");
      $req->bindValue(':id_u', $id_u,  PDO::PARAM_INT);
      $req->execute();
      header('Location:utilisateur');
      return $req->fetch();
  }

  public function dropUser($id_u)
  {
      global $bdd;
      $req = $bdd->prepare("DELETE FROM users WHERE id_u =".$id_u);
      $req->execute();
      header('Location:inscription');
      return $req->fetch();
  }

  public function resetPassword($email, $mdp)
  {
    global $bdd;
    $verif = $bdd->query("SELECT email FROM users WHERE email = '".$email."'");
    if($verif->rowCount() >= 1){
      $req = $bdd->prepare("UPDATE users SET mdp = :mdp WHERE email = :email");
      $req->bindValue(':mdp', sha1($mdp),  PDO::PARAM_STR);
      $req->bindValue(':email', $email,  PDO::PARAM_STR);
      $req->execute();
      header('Location:login');
      return $req->fetch();
    }
    echo"<p class='btn btn-danger'><b>Adresse email inconnu</b></p>";
  }

  public function setProfil($nom, $prenom, $email, $mdp, $id_u)
  {
    global $bdd;
    $verif = $bdd->query("SELECT email FROM users WHERE id_u = '".$id_u."'");
    if($verif->rowCount() >= 1){
      $req = $bdd->prepare("UPDATE users SET nom_u = :nom, prenom = :prenom, mdp = :mdp, email = :email WHERE id_u = :id_u ");
      $req->bindValue(':nom', $nom,  PDO::PARAM_STR);
      $req->bindValue(':prenom', $prenom,  PDO::PARAM_STR);
      $req->bindValue(':email', $email,  PDO::PARAM_STR);
      $req->bindValue(':mdp', sha1($mdp),  PDO::PARAM_STR);
      $req->bindValue(':id_u', $id_u,  PDO::PARAM_STR);
      $req->execute();
      header('Location:logout');
      echo"<p class='btn btn-success'><b>Votre profile a été modifier avec succès</b></p>";
      return $req->fetch();
    }
    echo"<p class='btn btn-danger'><b>Adresse email inconnu</b></p>";
  }

  public function setPassword($email)
  {
    global $bdd;
    $verif = $bdd->query("SELECT email FROM users WHERE email = '".$email."'");
    if($verif->rowCount() >= 1){
      $req = $bdd->prepare("UPDATE users SET mdp = :mdp WHERE email = :email");
      $req->bindValue(':mdp', sha1('azerty'),  PDO::PARAM_STR);
      $req->bindValue(':email', $email,  PDO::PARAM_STR);
      $req->execute();
      header('Location:utilisateur');
      return $req->fetch();
    }
  }

  public function login($log)
  {
    global $bdd;

      $email =  htmlspecialchars($log['email']);
      //var_dump($email);
      $mdp =  sha1(htmlspecialchars($log['mdp']));
      //var_dump($mdp);
      $requete = $bdd->prepare("SELECT * FROM users WHERE email = :email AND mdp = :mdp ");
      //var_dump($requete);
      $requete->bindValue(':email',$email,PDO::PARAM_STR);
      $requete->bindValue(':mdp',$mdp,PDO::PARAM_STR);
      $requete->execute();
      if($reponse = $requete->fetch())
      {
        $_SESSION['niveau'] = $reponse['niveau'];
        $_SESSION['email'] = $reponse['email'];
        $_SESSION['mdp'] = $reponse['mdp'];
        $_SESSION['nom'] = $reponse['nom_u'];
        $_SESSION['prenom'] = $reponse['prenom'];
        $_SESSION['id_u'] = $reponse['id_u'];

          if(isset($log['remember']))
          {
              setcookie('auth',$reponse['id_u']."-----".sha1($reponse['email'].$reponse['mdp'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true); //le dernier argument evite que le cookie soit editable en javascript
          }

          if($_SESSION['niveau'] == -1){
            echo "<p class='btn btn-warning'><b>Vous avez été banni de l'application. S'il s'agit d'une erreur,
                                                veillez envoyer un email à admin@admin.com</b></p>
                                                  ";
          }

          if($_SESSION['niveau'] == 0){
            echo "<p class='btn btn-warning'><b>Votre demande d'inscription est encore en cours de traitement
                                                  nous vous remercions de bien vouloir réessayer sous 12h svp.</b></p>
                                                  ";
          }

          if($_SESSION['niveau'] == 1){
              $_SESSION['connecte'] = true;
              header('Location:accueil');
          }

          if($_SESSION['niveau'] == 2){
              $_SESSION['connecte'] = true;
              header('Location:accueil');
          }
      }
      else
      {
          echo "<p class='btn btn-danger'><b>Identifiants incorrectes</b></p>";
      }
  }

  public function register($reg) {
    global $bdd;
    $nom =  htmlspecialchars($reg['nom']);
    $prenom =  htmlspecialchars($reg['prenom']);
    $email =  htmlspecialchars($reg['email']);
    $mdp =  sha1(htmlspecialchars($reg['mdp']));
    $date_i = date("j-m-y  H:i:s");
    $niveau =  0;
    $rang = 0;


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

     if($nombre_email == 0){
       // Enregistrement de l'utilisateur dans la base de donnees
       $req_insert_user = $bdd->prepare("INSERT INTO users (nom_u, prenom, mdp, email, date_i, niveau, rang)
                                         VALUES (:nom, :prenom, :mdp, :email, :date_i, :niveau, :rang) " );
       $req_insert_user->bindValue(':nom', $nom, PDO::PARAM_STR);
       $req_insert_user->bindValue(':prenom', $prenom, PDO::PARAM_STR);
       $req_insert_user->bindValue(':mdp', $mdp, PDO::PARAM_STR);
       $req_insert_user->bindValue(':email', $email, PDO::PARAM_STR);
       $req_insert_user->bindValue(':date_i', $date_i, PDO::PARAM_STR);
       $req_insert_user->bindValue(':niveau', $niveau, PDO::PARAM_INT);
       $req_insert_user->bindValue(':rang', $rang, PDO::PARAM_INT);
       // $req_insert_user->execute();
       //var_dump($req_insert_user);
       header("location:login");
       return $req_insert_user->execute();
     }
    }
  }

  public function addUser($nom, $prenom, $email, $mdp) {
    global $bdd;
    $nom =  htmlspecialchars($nom);
    $prenom =  htmlspecialchars($prenom);
    $email =  htmlspecialchars($email);
    $mdp =  sha1(htmlspecialchars($mdp));
    $date_i = date("j-m-y  H:i:s");
    $niveau =  0;
    $rang = 0;


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
     //var_dump($nombre_email);
     if($nombre_email == 0){
       // Enregistrement de l'utilisateur dans la base de donnees
       $req_insert_user = $bdd->prepare("INSERT INTO users (nom_u, prenom, mdp, email, date_i, niveau, rang)
                                         VALUES (:nom, :prenom, :mdp, :email, :date_i, :niveau, :rang) " );
       $req_insert_user->bindValue(':nom', $nom, PDO::PARAM_STR);
       $req_insert_user->bindValue(':prenom', $prenom, PDO::PARAM_STR);
       $req_insert_user->bindValue(':mdp', $mdp, PDO::PARAM_STR);
       $req_insert_user->bindValue(':niveau', $niveau, PDO::PARAM_INT);
       $req_insert_user->bindValue(':date_i', $date_i, PDO::PARAM_STR);
       $req_insert_user->bindValue(':email', $email, PDO::PARAM_STR);
       $req_insert_user->bindValue(':rang', $rang, PDO::PARAM_INT);
       //$req_insert_user->execute();
       //var_dump($req_insert_user->execute());
       header("location:inscription");
       return $req_insert_user->execute();
     }
    }
  }

}
