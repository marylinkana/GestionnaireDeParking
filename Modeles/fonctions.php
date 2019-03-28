<?php
    function getListUser()
    {
        global $bdd;

        $req = $bdd->query("SELECT * FROM users where niveau = 1");
        return $req;
    }

    function getRankUser($id_u)
    {
      global $bdd;
      $req = $bdd->query("SELECT * FROM users where id_u = $id_u AND rang != 0");
      return $req;
    }

    function getListInscrit()
    {
        global $bdd;
        $req = $bdd->query("SELECT * FROM users where niveau = 0");
        return $req;
    }

    function dropUser($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("DELETE FROM users WHERE id_u =".$id_u);
        $req->execute();

        return $req->fetch();
    }

    function insertIntoWettingList($id_u)
    {
      global $bdd;
      $maxRang = $bdd->query("SELECT MAX(rang) FROM users");
      $maxRang = $maxRang->fetch();
      $maxRang = $maxRang['MAX(rang)'] + 1;
      $req = $bdd->prepare("UPDATE users SET rang = $maxRang WHERE id_u = :id_u");
      $req->bindValue(':id_u', $id_u,  PDO::PARAM_INT);
      $req->execute();

      return $req->fetch();
    }

    function getWettingList()
    {
        global $bdd;

        $req = $bdd->query("SELECT * FROM users WHERE rang > 0 ORDER BY rang DESC");
        return $req;
    }

    function exitOfFile(){
      global $bdd;
      $dateNow = date("j-m-y  H:i:s");
      //var_dump($dateNow);
      $newFreePlace = $bdd->query("SELECT * FROM reservations WHERE dateFin <= '.$dateNow.'");
      //var_dump($newFreePlace->fetch());
      while($newFreePlace = $newFreePlace->fetch()){
        $wetter = $bdd->query("SELECT id_u FROM users WHERE rang = (SELECT MAX(rang) FROM users) && rang != 0");
        $wetter = $wetter->fetch();
        reserver($newFreePlace['id_pl'], $wetter['id_u']);
        $resetRang = $bdd->query("UPDATE users SET rang = 0 WHERE id_u =".$wetter['id_u']);
        $resetRang->fetch();
      }
    }

    function valideInsc($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("UPDATE users SET niveau = 1 WHERE id_u = :id_u");
        $req->bindValue(':id_u', $id_u,  PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }

    function annuleInsc($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("UPDATE users SET niveau = 0 WHERE id_u = :id_u");
        $req->bindValue(':id_u', $id_u,  PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }

    function addPlace($nom)
    {
        global $bdd;
        $places = "SELECT id_p FROM places WHERE nom_p='".$nom."'";
        $resultat = $bdd->prepare($places);
        $resultat->execute();
        $repet = $resultat->rowCount();
        if($repet < 1){
          $req = $bdd->prepare("INSERT INTO places (nom_p) VALUES (:nom)");
          $req->bindValue(':nom', $nom, PDO::PARAM_STR);
          $req->execute();
          return $req->fetch();
        }
    }

    function deletePlace($id_p)
    {
        global $bdd;
        $req = $bdd->prepare("DELETE FROM places WHERE id_p= :id_p");
        $req->bindValue(':id_p', $id_p, PDO::PARAM_STR);
        $req->execute();

        return $req->fetch();
    }

    function getListPlaces()
    {
        global $bdd;

        $requete = $bdd->query("SELECT * FROM places");
        return $requete;
    }

    function getListPlacesDispo()
    {
        global $bdd;
        $requete = $bdd->query("SELECT * FROM places WHERE id_p NOT IN (SELECT id_pl FROM reservations WHERE id_pl IS NOT NULL AND dateFin > NOW()) GROUP BY id_p");
        return $requete;
    }

    function deleteUsedPlace($id_p)
    {
        global $bdd;

        $req = $bdd->prepare("DELETE FROM reservations WHERE id_pl=".$id_p);
        $requete->bindValue(':id_p', $id_p, PDO::PARAM_STR);
        $req->execute();

        return $req->fetch();
    }

    function get_user_cookie($id)
    {
        global $bdd;

        $user = $bdd->prepare("SELECT * FROM users WHERE id_u=:id");
        $user->bindValue(':id',$id,PDO::PARAM_INT);
        $user->execute();
        return $user->fetch();
    }

    function reserver($p, $u)
    {
        global $bdd;

        $d = date("j-m-y  H:i:s");
        $d1 = date("j-m-y  H.i.s", strtotime("+1 minutes"));

        $res = $bdd->prepare("INSERT INTO reservations (id_us, id_pl, dateDebut, dateFin) VALUES (:id_u, :id_p, :dateDebut, :dateFin)");
        $res->bindValue(':id_u', $u ,PDO::PARAM_STR);
        $res->bindValue(':id_p', $p ,PDO::PARAM_STR);
        $res->bindValue(':dateDebut', $d ,PDO::PARAM_STR); // mdp a cryter dans la bdd
        $res->bindValue(':dateFin', $d1,PDO::PARAM_STR); // mdp a cryter dans la bdd
        $res->execute();
        $resetRang = $bdd->query("UPDATE users SET rang = 0 WHERE id_u = $u");
        $resetRang->fetch();
        return $res;
    }

    function getListReservation()
    {
        global $bdd;
        $requete = $bdd->query("SELECT * FROM reservations, places, users WHERE id_p = id_pl AND id_u = id_us");
        return $requete;
    }

    function getListMesReservation($id_u)
    {
        global $bdd;
        $req = $bdd->query("SELECT * FROM reservations, places, users WHERE id_us = $id_u AND id_u = $id_u AND id_u = id_us AND id_u = $id_u AND id_p = id_pl");
        return $req;
    }
