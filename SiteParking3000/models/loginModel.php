<?php
require ("../connexion.php");
     if(isset($_POST['submit']));//si formulaire validé
         
         function login_user(){
            global $bdd;

            // Si l'utilisateur appuie sur le bouton pour se connecter
            if(isset($_POST['login']))
            {
                // On définit des variables "sécurisé" pour empecher toutes tentatives de Hack SQL
                $email = htmlspecialchars(addslashes(trim($_POST['email'])));
                $password = htmlspecialchars(addslashes(trim($_POST['password'])));
                $password = md5($password);

                // Si les champs mdp et email sont remplis
                 if(isset($email) && isset($password))   
                {
                    // Requete SQL pour savoir si un utilisateur posséde l'adresse email renseigner 
                    $sql = "SELECT email FROM users WHERE email = '$email' ";
                    $sql = $bdd->query($sql);
                    $sql = $sql->rowCount();

                    if($sql != 0) // Si une adresse email est trouvé dans la BDD
                    {
                        // Requete SQL pour savoir si le mot de passe renseigné correspont à l'adresse email renseigner        
                        $sql1 = "SELECT password FROM users WHERE password = '$password' AND email = '$email'";
                        $sql1 = $bdd->query($sql1);
                        $sql1 = $sql1->rowCount();

                        if($sql1 != 0) // Sile mot de passe correspond
                        {     
                            // On formate les identifiants dans une clés pour l'authentification
                            $auth = $email . "/-auth-/" . md5($email) . sha1($password);  

                        }
                            // On stock la clé dans une variable SESSION
                            $_SESSION['Authentification_Site_Streaming'] = $auth;
                    }


                }
            }
     }
?>