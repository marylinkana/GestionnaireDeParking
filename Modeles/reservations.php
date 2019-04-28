<?php
class Reservation{

  private $timeReserv;

  public function __construct($timeReserv){
    $this->timeReserv = $timeReserv;
    return $this->timeReserv;
  }

  public function setTimeReserv($timeReserv){
    $this->timeReserv = $timeReserv;
    return $this->timeReserv;
  }
  public function setUserReserv($userReserv){
    $this->userReserv = $userReserv;
    return $userReserv;
  }
  public function setPlaceReserv($placeReserv){
    $this->placeReserv = $placeReserv;
    return $placeReserv;
  }
  public function setDateDebut($dateDebut){
    $this->dateDebut = $dateDebut;
    return $dateDebut;
  }
  public function setDateFin($lastDateFin, $newDateFin, $id_us, $id_pl){
    global $bdd;
    $setDateFin = $bdd->prepare("UPDATE reservations SET dateFin = :newDateFin WHERE dateFin = :lastDateFin AND id_us = :id_us AND id_pl = :id_pl");
    $setDateFin->bindValue(":newDateFin", $newDateFin ,PDO::PARAM_STR);
    $setDateFin->bindValue(":lastDateFin", $lastDateFin ,PDO::PARAM_STR);
    $setDateFin->bindValue(":id_us", $id_us,PDO::PARAM_INT);
    $setDateFin->bindValue(":id_pl", $id_pl,PDO::PARAM_INT);
    $setDateFin->execute();
    header('Location:reservation');
    return $setDateFin;
  }

  public function getTimeReserv(){
    return $this->timeReserv;
  }
  public function getUserReserv(){
    return $this->userReserv;
  }
  public function getPlaceReserv(){
    return $this->placeReserv;
  }
  public function getDateDebut(){
    return $this->dateDebut;
  }
  public function getDateFin(){
    return $this->dateFin;
  }

  public function createReserv($p, $u)
  {
      global $bdd;
      $dateDebut = date("j-m-y H:i:s");
      $dateFin = date("j-m-y H.i.s", strtotime("+$this->timeReserv minutes"));
      //var_dump($this->timeReserv);
      $verif = $bdd->prepare("SELECT * FROM reservations WHERE id_us = '".$u."' AND dateFin >= '".$dateDebut."'");
      $verif->execute();
      $occurence = $verif->rowCount();
      //var_dump($occurence);
      if($occurence == 0){
        $res = $bdd->prepare("INSERT INTO reservations (id_us, id_pl, dateDebut, dateFin) VALUES (:id_u, :id_p, :dateDebut, :dateFin)");
        $res->bindValue(':id_u', $u ,PDO::PARAM_INT);
        $res->bindValue(':id_p', $p ,PDO::PARAM_INT);
        $res->bindValue(':dateDebut', $dateDebut ,PDO::PARAM_STR);
        $res->bindValue(':dateFin', $dateFin,PDO::PARAM_STR);
        $res->execute();
        $resetRang = $bdd->prepare("UPDATE users SET rang = 0 WHERE id_u = $u");
        $resetRang->execute();
        header('Location:accueil');
        return $res;
      }
  }

  public function attribiuteReserv($p, $u)
  {
      global $bdd;
      $dateDebut = date("j-m-y H:i:s");
      $dateFin = date("j-m-y H.i.s", strtotime("+$this->timeReserv minutes"));
      //var_dump($this->timeReserv);
      $verif = "SELECT * FROM reservations WHERE id_us = '".$u."' AND dateFin >= '".$dateDebut."'";
      $resultat = $bdd->prepare($verif);
      //var_dump($resultat->execute());
      $resultat->execute();
      $occurence = $resultat->rowCount();
      //var_dump($occurence);
      if($occurence == 0){
        $res = $bdd->prepare("INSERT INTO reservations (id_us, id_pl, dateDebut, dateFin) VALUES (:id_u, :id_p, :dateDebut, :dateFin)");
        $res->bindValue(':id_u', $u ,PDO::PARAM_INT);
        $res->bindValue(':id_p', $p ,PDO::PARAM_INT);
        $res->bindValue(':dateDebut', $dateDebut ,PDO::PARAM_STR);
        $res->bindValue(':dateFin', $dateFin,PDO::PARAM_STR);
        $res->execute();
        $resetRang = $bdd->prepare("UPDATE users SET rang = 0 WHERE id_u = $u");
        $resetRang->execute();
        header('Location:place');
        //var_dump($res);
        return $res;
    }

  }

  public function getMyReservList($id_u)
  {
      global $bdd;
      $req = $bdd->query("SELECT * FROM reservations, places, users WHERE id_us = $id_u AND id_u = $id_u
                          AND id_u = id_us AND id_p = id_pl");
      return $req;
  }

  public function getMyCurrentReserv($id_u){
    global $bdd;
    $dateNow = date("j-m-y H:i:s");
    $req = $bdd->query("SELECT * FROM reservations, places, users WHERE id_us = $id_u AND id_u = $id_u
                        AND id_u = id_us AND id_p = id_pl AND dateFin > '".$dateNow."' ");
    return $req;
  }

  public function getCurrentReserv(){
    global $bdd;
    $dateNow = date("j-m-y H:i:s");
    $req = $bdd->query("SELECT * FROM reservations, places, users WHERE id_p = id_pl AND id_u = id_us AND dateFin > '".$dateNow."' ");
    return $req;
  }

  public function getEndReserv(){
    global $bdd;
    $dateNow = date("j-m-y H:i:s");
    $req = $bdd->query("SELECT * FROM reservations, places, users WHERE id_p = id_pl AND id_u = id_us AND dateFin < '".$dateNow."' ");
    return $req;
  }

  public function ecourterMyReserv($id_r){
    global $bdd;
    $dateNow = date("j-m-y H:i:s");
    $req = $bdd->query("UPDATE reservations SET dateFin = '".$dateNow ."'WHERE id_r = '".$id_r."' ");
    header('location:exportcsv');
    return $req;
  }

  public function ecourterReserv($id_r){
    global $bdd;
    $dateNow = date("j-m-y H:i:s");
    $req = $bdd->query("UPDATE reservations SET dateFin = '".$dateNow ."'WHERE id_r = '".$id_r."' ");
    header('location:reservation');
    return $req;
  }

  public function getAllReservList()
  {
      global $bdd;
      $requete = $bdd->query("SELECT * FROM reservations, places, users WHERE id_p = id_pl AND id_u = id_us");
      return $requete;
  }

  public function getListResvRecherche($recherche)
  {
    global $bdd;
    $req = $bdd->query("SELECT * FROM reservations, places, users where id_p = id_pl AND id_u = id_us
                        AND id_us IN (SELECT id_u FROM users where  nom_u = '$recherche' OR prenom = '$recherche')
                        OR id_pl IN (SELECT id_p FROM places where  nom_p = '$recherche')");
    return $req;
  }

  public function annuleReserv($id_u, $id_r, $date_d)
  {
      global $bdd;
      $req = $bdd->prepare("DELETE FROM reservations WHERE id_us = :id_u AND id_r = :id_r AND dateDebut = :date_d");
      $req->bindValue(':id_u', $id_u  ,  PDO::PARAM_INT);
      $req->bindValue(':id_r', $id_r,  PDO::PARAM_INT);
      $req->bindValue(':date_d', $date_d,  PDO::PARAM_STR);
      $req->execute();
      header('Location:reservation');
      return $req->fetch();
  }

  public function deleteReserv($id_p)
  {
      global $bdd;
      $req = $bdd->prepare("DELETE FROM reservations WHERE id_pl = :id_p");
      $req->bindValue(':id_p', $id_p  ,  PDO::PARAM_INT);
      $req->execute();
      header('Location:reservation');
      return $req->fetch();
  }
}


?>
