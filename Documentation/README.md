# GestionnaireDeParking


Il s'agit d'une application web de gestions des reservations des place de parking, dévellopé en PHP Object et JavaScript.



Spécificités de L'application  :
    Le front-office est sécurisé et n’accepter que les demandes du personnel. 
    Les inscriptions au service de réservation de place doivent être validées par un administrateur.
    L’administrateur, seul utilisateur du back-office, peut éditer la liste des places et gérer les inscriptions des utilisateurs.
    Lorsqu’un utilisateur en fait la demande, une place libre lui est attribuée aléatoirement et immédiatement par l’application, la réservation expire automatiquement au bout d’une durée par défaut déterminée par l’administrateur.
    Si une demande ne peut pas être satisfaite, l’utilisateur est placé en liste d’attente.
    Un utilisateur ou l’administrateur peuvent fermer une réservation avant la date d’expiration prévue. Une fois celle-ci expirée, l’utilisateur doit refaire une demande s’il souhaite obtenir une place.




Liste des Tâches exécutées :


1  Sécurité

Protection des accès par mot de passe.

Contrôles de saisie des données côté serveur.

Contrôles de saisie côté client.

Protection contre les attaques par injection.




2  Gestion des mots de passe

Fonction "mot de passe perdu ?".

Hachage des mots de passe.




3  Espace utilisateur

Vérification de l’identité par saisie d’un mot de passe.

Possibilité de visualiser le numéro de place attribuée, ainsi que l’historique des places précédemment attribuées.

Possibilité de faire une demande de réservation.

Possibilité de connaître son rang sur la file d’attente.

Modification du mot de passe.




4  Espace administrateur

Protection de l’accès par mot de passe.

Édition de la liste des utilisateurs.

Réinitialisation des mots de passe.

Édition de la liste des places.

Consultation de la liste d’attente.

Consultation de l’historique d’attribution des places.

Attribution manuelle des places.

Édition de la file d’attente (modification de la position des personnes en attente).




5  Pages web

Mise aux normes HTML5 et CSS des pages WEB. 

Utilisation d’un design responsive.



6  Documentation

Liste des tâches à accomplir par ordre de priorité.

Documentation utilisateur, accessible depuis l’application.

Documentation permettant de comprendre comment est construite l’application (shémas, impressions d’écran, MCD...).




7  Accès depuis le réseau local

Installation de l’application sur un serveur accessible depuis le réseau local.
