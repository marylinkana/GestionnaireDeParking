<link  rel = "stylesheet"  href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<div  class = "conteneur" >
    <div  class = "panel panel-default" >
        <div  class = "panel-heading" >
            Historiques des réservations
            <form method="post" action="exportcsv">
              <!-- <i class="fa fa-download"/> -->
              <input type="submit" class="btn btn-success" name="download" value="Exporter le fichier csv"/>
            </form>
        </div>
        <div  class = "panel-body" >
            <table  class = "table bordée de table" >
                <thead>
                    <tr>
                      <th> Nom </th>
                      <th> Prenom </th>
                      <th> Email </th>
                      <th> Places </th>
                      <th> dateDebut </th>
                      <th> dateFin </th>
                    </tr>
                </thead>
                <tbody>
                 <?php
                    // inclure le fichier de configuration de la base de données
                    include  'connexion.php' ;
                    // récupère les enregistrements de la base de données
                    if(isset($_SESSION['niveau']) && $_SESSION['niveau'] == 2){
                        $query  =  $bdd->query( "SELECT * FROM reservations, users, places WHERE id_us = id_u AND id_pl = id_p ORDER BY id_r DESC" );
                    }
                    else{
                        $query  =  $bdd->query( "SELECT * FROM reservations, users, places WHERE id_us = ".$_SESSION['id_u']." AND id_us = id_u AND id_pl = id_p ORDER BY id_r DESC" );
                    }

                    if ( $query->rowCount()  >  0 ) {
                        while ( $row  =  $query->fetch()) {  ?>
                    <tr>
                      <td> <?php  echo  $row[ 'nom_u' ]; ?> </td>
                      <td> <?php  echo  $row[ 'prenom' ]; ?> </td>
                      <td> <?php  echo  $row[ 'email' ]; ?> </td>
                      <td> <?php  echo  $row[ 'nom_p' ]; ?> </td>
                      <td> <?php  echo  $row[ 'dateDebut' ]; ?> </td>
                      <td> <?php  echo  $row[ 'dateFin' ]; ?> </td>
                    </tr>
                     <?php  }} else {  ?>
                    <tr> <td  colspan = "5" > Aucun membre trouvé ..... </td> </tr>
                     <?php  }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
