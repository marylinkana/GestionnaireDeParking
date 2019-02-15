<?php
session_start();
include "page/config.php";

// Requete pour recuperer les données d'un utilisateur avec l'adresse email renvoyer par la fct login_Email()
$login = login_Email();

// Requete SQL pour recuperer les données d'un utilisateur avec l'adresse email renvoyer par la fct login_Email()
$sql = "SELECT * FROM users WHERE email = '" . $login . "'";
$sql = $bdd->query($sql);
$sql = $sql->fetch(PDO::FETCH_ASSOC);

// Si l'utilisateur n'est pas connecté on le redirige sur la page login.php pour qu'il se connecte
// Sinon si il est connecté on regarde si la valeur "users_pseudo" est définis (et donc que l'utilisateur
// est configurer son profils) sinon si le profils n'est pas remplis on redirige l'utilsateur sur la page
// modify_account.php

if(!isset($_GET['Nom'])){
    $sql_c = "1";
    $titre = "Mon Profil";
    if(!isset($login)){
        header('Location:Login');
    }else if(!$sql['nom']){
        header('Location:Modification/infos');
    }
}else{
    $titre = $_GET['nom'];
    $sql = "SELECT * FROM users WHERE nom = '" . $_GET['nom'] . "'";
    $sql = $bdd->query($sql);
    $sql_c = $sql->rowCount();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <title><?php echo $titre; ?></title>
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="../publics/css/account.css">
</head>
<body>
<?php
include "page/header.php";
if($sql_c == 1){
    if(!isset($_GET['nom'])){

        ?>

        <div class="content_title">
            <div class="center">
                <div class="titre_page1">MON PROFIL</div>
                <a href="logout" class="titre_page2">déconnexion</a>
            </div>
        </div>

    <?php } ?>

    <div class="content"><br>
        <div class="center">
            <div class="div_photo">
                <img src="<?php echo "data/profils/". $sql['id'] . ".jpg"; ?>" alt="Veuiller modifier votre profils et ajouter une image !" class="photo"/>
            </div>
            <div class="text_image">
				<span class="nom">
					<?php echo $sql['nom']. " ";;
                    // On affiche le Nom(en normal) ?>
				</span>



        </div>
        <?php if(!isset($_GET['nom'])){ ?>
            <a href="Modification" class="modifie">Modifier mon profil</a>
        <?php } ?>

    </div>
    </div>

<?php }else{ ?>


<div class="content">
    <?php
    echo "Aucun utilisateur ne correspond à ce pseudo !" . "<br><br>";
    echo "Il a peut être été supprimé :("; }
    ?>
</div>


</div>
<?php include "page/footer.php"; ?>
</body>
</html>