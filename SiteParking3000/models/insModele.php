<?php

    function add_user()
    {
require ("./connexion.php");
                // Si l'utilisateur appuie sur le bouton pour s'inscrire
        if(isset($_POST['inscripton'])){

        // On définit des variables "sécurisé" pour empecher toutes tentatives de Hack SQL
        $password = htmlspecialchars(addslashes(trim($_POST['password'])));
        $re_password = htmlspecialchars(addslashes(trim($_POST['re_password'])));
        $email = htmlspecialchars(addslashes(trim($_POST['email'])));
        $nom = htmlspecialchars(addslashes(trim($_POST['nom'])));
        $lvl = 1;
        $statutfile = 0;

            // Si touts les champs sont remplis
            if($password && $re_password && $email && $nom) 
                {   
                        // Si les deux mdp correspondent
                        if($password==$re_password)
                        {  
                                // Requete SQL pour savoir si un utilisateur posséde déja l'adresse email renseigner 
                                $sqlquery = "SELECT email FROM users WHERE email = '$email' ";
                                $sql = $bdd->query($sqlquery);
                                $sql = $sql->rowCount();
                                if($sql == 0) // Si aucune adresse email est trouvé dans la BDD
                                {	
                                    $password = sha1($password);


                                    // On insert dans la BDD une nouvelle ligne avec le mdp et l'email entrée par l'utilisateur                
                                    $sqlquery= "INSERT INTO users (nom, email, password, lvl, statutfile) VALUES('$nom','$email','$password','$lvl', '$statutfile')";
                                    $sql = $bdd->query($sqlquery);


                                    // On récupére toutes les données sur l'utilisateurs qui vient de s'enregister
                                    $sql_users = "SELECT * FROM users WHERE email = '$email'";
                                    $sql_users = $bdd->query($sql_users);
                                    $sql_users_data = $sql_users->fetch(PDO::FETCH_ASSOC);

                                    // On créer un variable $lien en fonction de l'ID de l'utilisateur
                                    $lien = "" ; 
                                    $sql_users_data['id_u'] ;
                                    
                                    return $lien;

                                }
                        }
                    }
            }
        }
    }

        