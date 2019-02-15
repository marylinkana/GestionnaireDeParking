<?php
require ("./connexion.php");

namespace App\Model;

use \Core\Model\Model;

class ReservationModel extends Model {

    protected $tableName = 'reservation';
    protected $tableInputs = ['id_u', 'id_p', 'date_deb', 'date_fin'];


    /*
     * renvoie les places disponibles
     */
    public function getAllAvailablePlaces(){
        global $bdd;
        $results = $this->bdd->query('SELECT id FROM places WHERE id NOT IN (SELECT id_p FROM reservation WHERE id_p IS NOT NULL AND date_fin > NOW() )');
        return $results;
    }

    /*
     * renvoie un places disponibles
     */
    public function getOneAvailablePlace(){
        global $bdd;
        $results = $this->bdd->query('SELECT id_u FROM places WHERE id_u NOT IN (SELECT id_p FROM reservation WHERE id_p IS NOT NULL AND date_fin > NOW() )', true);
        return $results;
    }

    /*
     * renvoie l'historique des mes places
     */
    public function getMyHistory($userId){
        
        $results = $this->all("WHERE id_u = $userId AND date_fin < now() order by date_fin");
        return $results;
    }

    /*
     * renvoie ma place si j'en possède une
     */
    public function havePlace($userId){
        $results = $this->all("WHERE id_u = $userId AND id_p != 0 AND date_fin > NOW()");
        return $results;
    }

    /*
     * renvoie ma demande de place dans la file d'attente
     */
    public function IsOnlist($userId){
        $results = $this->all("WHERE id_u = $userId AND id_p = 0");
        return $results;
    }

    /*
     * renvoie ma position dans la file d'attente
     */
    public function nbUserBeforeMeOnList($id){
        $results = $this->count('id_p = 0 AND id_u < ' . $id) + 1;
        return $results;
    }

    /*
     * renvoie la premiere personne de la file d'attente
     */
    public function firstUserInList(){
        $results = $this->db->query('SELECT * FROM reservation WHERE id_p = 0 ORDER BY id ASC', true);
        return $results;
    }

    /*
     * renvoie la premiere personne de la file d'attente
     */
    public function hasUserInList(){
        $results = $this->has('id_p = 0');
        return $results;
    }


    /* ADMIN */


    /*
     * renvoie l'historique de toutes les places
     */
    public function getAllHistory(){
        $results = $this->all("WHERE date_fin < now() order by date_fin DESC");
        return $results;
    }

    /*
     * renvoie la file d'attente
     */
    public function getAllList(){
        $results = $this->all("WHERE id_p = 0");
        return $results;
    }

}