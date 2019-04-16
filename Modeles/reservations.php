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
    header('Location:admin');
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
      $dateDebut = date("j-m-y  H:i:s");
      $dateFin = date("j-m-y  H.i.s", strtotime("+$this->timeReserv minutes"));
      //var_dump($this->timeReserv);
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

  public function getMyReservList($id_u)
  {
      global $bdd;
      $req = $bdd->query("SELECT * FROM reservations, places, users WHERE id_us = $id_u AND id_u = $id_u
                          AND id_u = id_us AND id_p = id_pl");
      return $req;
  }

  public function getAllReservList()
  {
      global $bdd;
      $requete = $bdd->query("SELECT * FROM reservations, places, users WHERE id_p = id_pl AND id_u = id_us");
      return $requete;
  }

  public function annuleReserv($id_u, $id_r, $date_d)
  {
      global $bdd;
      $req = $bdd->prepare("DELETE FROM reservations WHERE id_us = :id_u AND id_r = :id_r AND dateDebut = :date_d");
      $req->bindValue(':id_u', $id_u  ,  PDO::PARAM_INT);
      $req->bindValue(':id_r', $id_r,  PDO::PARAM_INT);
      $req->bindValue(':date_d', $date_d,  PDO::PARAM_STR);
      $req->execute();
      header('Location:admin');
      return $req->fetch();
  }

  public function deleteReserv($id_p)
  {
      global $bdd;
      $req = $bdd->prepare("DELETE FROM reservations WHERE id_pl = :id_p");
      $req->bindValue(':id_p', $id_p  ,  PDO::PARAM_INT);
      $req->execute();
      header('Location:admin');
      return $req->fetch();
  }
}


?>
