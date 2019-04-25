<?php
class Place{

  public function __construct(){
  }

  public function getListPlaces()
  {
      global $bdd;
      $requete = $bdd->query("SELECT * FROM places");
      return $requete;
  }

  public function getListPlacesDispo()
  {
      global $bdd;
      $dateNow = date("j-m-y H:i:s");
      $requete = $bdd->query("SELECT * FROM places WHERE id_p NOT IN (SELECT id_pl FROM reservations
                              WHERE dateFin > '".$dateNow."') GROUP BY id_p");

      return $requete;
  }

  public function getListPlaceRecherche($place){
    global $bdd;
    $dateNow = date("j-m-y H:i:s");
    $requete = $bdd->query("SELECT * FROM places WHERE nom_p = '".$place."' AND id_p NOT IN (SELECT id_pl FROM reservations
                            WHERE dateFin > '".$dateNow."') GROUP BY id_p");

    return $requete;
  }

  public function addPlace($nom)
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
        header('Location:newPlace');
        return $req->fetch();
      }
  }

  public function deletePlace($id_p, $reservation)
  {
      global $bdd;
      $req = $bdd->prepare("DELETE FROM places WHERE id_p = :id_p");
      $req->bindValue(':id_p', $id_p, PDO::PARAM_STR);
      $req->execute();
      $reservation->deleteReserv($id_p);
      header('Location:place');
      return $req->fetch();
  }
}

?>
