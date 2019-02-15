<?php
    require "/models/insModel.php";
      //On appelle la fonction add_user qui insert un nouvelle utilsateur en bdd
      add_user();

      // On redirige l'utilisateur sur la page login.php
      header('Location:login');


	// Si touts les champs sont remplis
	if($password && $re_password && $email && $re_email) 
		{   
			// Si les deux adresses emails correspondent
			if($email==$re_email)
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
						    $sqlquery= "INSERT INTO users (nom,password,email) VALUES('$nom','$password','$email')";
                           	$sql = $bdd->query($sqlquery);


							// On récupére toutes les données sur l'utilisateurs qui vient de s'enregister
							$sql_users = "SELECT * FROM users WHERE email = '$email'";
							$sql_users = $bdd->query($sql_users);
							$sql_users_data = $sql_users->fetch(PDO::FETCH_ASSOC);

							// On créer un variable $lien en fonction de l'ID de l'utilisateur
                            $lien = "" . $sql_users_data['id_u'] ;

							
							// On redirige l'utilisateur sur la page login.php
							header('Location:login');
							
                        }
                }


    require "/views/inslView.php";
     