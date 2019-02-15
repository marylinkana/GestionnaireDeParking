<?php
require 'models/reservationModel.class';

namespace App\Controller;


use App;
use App\Entity\ReservationEntity;
use Core\Authentification\Authentification;
use Core\Controller\Controller;
use Core\Form\Form;
use PDO;

class ReservationController {

    protected $reservationDuration;

    public function __construct()
    {
        parent::__construct();
        $this->reservationDuration = 60 * 60 * 24 * App::getTable('parameters')->find('paramKey', 'reservationDuration')->paramValue;
    }


    /* Button Action */

    /*
     * Lorsque qu'une place est disponible est que la file d'attente est vide et que l'on clique sur le bouton pour reserver la place
     */
    public function reserveButton(){

        $ReservationTable = App::getTable('reservation');

        $placeDisponible = $ReservationTable->getOneAvailablePlace();

        $user = App::getUser()->id;
        $date_deb = date('Y-m-d H:i:s');
        $date_fin = date('Y-m-d H:i:s', time() + $this->reservationDuration);

        $reservation = new ReservationEntity();
        $reservation->id_u = $user;
        $reservation->id_p = $placeDisponible->id;
        $reservation->date_deb = $date_deb;
        $reservation->date_fin = $date_fin;

        $ReservationTable->add($reservation);
        App::redirect('reservation_route');
    }

    /*
     * Lorsque l'on clique sur le bouton pour rejoindre la file d'attente
     */
    public function joinButton(){

        $user = App::getUser()->id;
        $reservation = new ReservationEntity();
        $reservation->id_u = $user;
        $reservation->id_p = 0;

        App::getTable('reservation')->add($reservation);
        App::redirect('reservation_route');
    }

    /*
     * Lorsque l'on clique sur le bouton pour quitter la file d'attente
     */
    public function unjoinButton(){

        $userId = App::getUser()->id;
        $reservation = App::getTable('reservation')->IsOnlist($userId);

        App::getTable('reservation')->delete( end($reservation) );
        App::redirect('reservation_route');
    }

    /*
     * Lorsque l'on clique sur le bouton pour liberer ça place de parking
     */
    public function leaveButton(){

        $userId = App::getUser()->id;
        $reservation = App::getTable('reservation')->havePlace($userId)[0];

        $date_fin = date('Y-m-d H:i:s', time() - 1);
        $reservation->date_fin = $date_fin;
        App::getTable('reservation')->update($reservation);


        $this->executeUpdateAvailablePlaces();

        App::redirect('reservation_route');
    }


    /*
     * Affichage de la page de reservation de place avec les diffrents bouttons
     */
    public function index(){

        if( !App::getUser() ){
            App::redirect('login_route');
        }

        $reservationTable = App::getTable('reservation');

        $placesDisponible = $reservationTable->getAllAvailablePlaces();
        $userId = App::getUser()->id;

        $havePlace = $reservationTable->havePlace($userId);
        $isOnList = $reservationTable->IsOnlist($userId);

        if(count($placesDisponible) > 0 && $placesDisponible != null){
            $action = "reserve";
        }else{
            $action = "join";
            $listNumber = App::getTable('reservation')->count('id_p = 0');
        }

        if($isOnList){
            $id = end($isOnList)->id;
            $listNumber = App::getTable('reservation')->nbUserBeforeMeOnList($id);
            $action = "isOnList";
        }

        if($havePlace){
            $reservation = end( App::getTable('reservation')->havePlace($userId) );
            $place = App::getTable('places')->findById( end($havePlace)->id_p );
            $action = "havePlace";
        }

        return $this->render('App/Views/reservations', [
            'historiqueElems'=> $this->historiqueReservation(),
            'action' => $action,
            'placesDisponible' => $placesDisponible,
            'myPlace' => $place,
            'listNumber' => $listNumber,
            'reservation' => $reservation
        ]);

    }


    /*
     * Réattribution automatique des places (pour la file d'attente) lorsque q'un utilisateur charge le site
     */
    public static function updateAvailablePlaces()
    {
        self::getInstance()->executeUpdateAvailablePlaces();
    }

    public function executeUpdateAvailablePlaces(){
        $reservationTable = App::getTable('reservation');

        $AllPlacesDisponible = $reservationTable->getAllAvailablePlaces() ;
        $hasUserInList = $reservationTable->hasUserInList() ;

        if(count($AllPlacesDisponible) > 0 && $AllPlacesDisponible != null && $hasUserInList){

            foreach ($AllPlacesDisponible as $placeDisponible){

                $reservation = $reservationTable->firstUserInList();

                $date_deb = date('Y-m-d H:i:s');
                $date_fin = date('Y-m-d H:i:s', time() + $this->reservationDuration);

                $reservation->id_p = $placeDisponible->id;
                $reservation->date_deb = $date_deb;
                $reservation->date_fin = $date_fin;

                $reservationTable->update($reservation);
            }

        }

    }


    private static $_instance;

    public static function getInstance(){
        if (is_null(self::$_instance)) {
            self::$_instance = new App\Controller\ReservationController();
        }
        return self::$_instance;
    }


}

require 'views/accueilView.class';
