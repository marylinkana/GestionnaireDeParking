<?php
    function getListUser()
    {
        global $bdd;

        $req = $bdd->query("SELECT * FROM users where niveau = 1");
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


    function getWettingList()
    {
        global $bdd;

        $req = $bdd->query("SELECT u.nom, u.prenom, r.niveau, p.nom_p, p.id_p, r.date_deb FROM reserations r, users u, places p WHERE r.niveau = 0 AND r.id_p = p.id_p AND u.id_u = r.id_u ORDER BY r.timestamp DESC");

        return $req;
    }

    function bookPlace($id_p)
    {
        global $bdd;

        $req = $bdd->prepare("UPDATE reservation SET niveau = 0 WHERE id_p = :id_p");
        $req->bindValue(":id_p", $id_p,  PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }

    function valideInsc($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("UPDATE users SET niveau = 1 WHERE id_u = :id_u");
        $req->bindValue(":id_u", $id_u,  PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }

    function annuleInsc($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("UPDATE users SET niveau = 0 WHERE id_u = :id_u");
        $req->bindValue(":id_u", $id_u,  PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }

    function denyPlace($id_p)
    {
        global $bdd;

        $req = $bdd->prepare("UPDATE reserver SET niveau = 1 WHERE id_p = :id_p");
        $req->bindValue(":id_p", $id_p, PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }

    function addPlace($nom)
    {
        global $bdd;

        $requete = $bdd->prepare("INSERT INTO places(nom) VALUES (:nom)");

        $requete->bindValue(":nom", $nom,PDO::PARAM_STR);
        $requete = $requete->execute();
        return $requete;
    }

    function getListPlaces()
    {
        global $bdd;

        $requete = $bdd->query("SELECT * FROM places");
        return $requete;
    }


    function displayUsedPlace()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT p.id_p, p.nom, u.nom, u.prenom FROM reservation r, places p, users u WHERE p.id_p = r.id_p AND r.id_u = u.id_u AND r.niveau = 1");
        $req->execute();

        return $req;
    }

    function displayUsedPlaceRefus()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT p.id_p, p.nom, u.nom, u.prenom FROM reservation r, places p, users u WHERE p.id_p = r.id_p AND r.id_u = u.id_u AND r.niveau = 2");
        $req->execute();

        return $req;
    }


    function deleteUsedPlace($id_p)
    {
        global $bdd;

        $req = $bdd->prepare("DELETE FROM reservation WHERE id_p=".$id_p);

        $req->execute();

        return $req->fetch();
    }
