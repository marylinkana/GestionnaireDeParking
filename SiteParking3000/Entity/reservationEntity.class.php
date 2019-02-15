<?php

namespace App\Entity;

use App;
use \Core\Entity\Entity;

class ReservationEntity extends Entity {

    protected $id;
    protected $id_u;
    protected $id_p;
    protected $date_deb;
    protected $date_fin;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }


}