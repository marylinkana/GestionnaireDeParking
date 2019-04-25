<?php
// if(isset($_POST['download'])){
//   function exportcsv(){
      //include database configuration file
      include 'connexion.php';

      //get records from database
      $query  =  $bdd->query( "SELECT * FROM reservations, users, places WHERE id_us = id_u AND id_pl = id_p ORDER BY id_r DESC" );
      if($query->rowCount() > 0){
          $delimiter = ";";
          $filename = "Historique_des_réservations_" . date('Y-m-d') . ".csv";

          //create a file pointer
          $f = fopen('php://memory', 'w');

          //set column headers
          $fields = array('id', 'nom', 'prenom', 'email', 'place', 'date Debut', 'date Fin');
          fputcsv($f, $fields, $delimiter);

          //output each row of the data, format line as csv and write to file pointer
          while($row = $query->fetch()){
              //$status = ($row['status'] == '1')?'Active':'Inactive';
              $lineData = array($row['id_r'], $row['nom_u'], $row['prenom'], $row['email'], $row['nom_p'], $row['dateDebut'], $row['dateFin']);
              fputcsv($f, $lineData, $delimiter);
          }

          //move back to beginning of file
          fseek($f, 0);

          //set headers to download file rather than displayed
          header('Content-Type: text/csv');
          header('Content-Disposition: attachment; filename="' . $filename . '";');

          //output all remaining data on a file pointer
          fpassthru($f);

      }
      exit;
  // }
// }
?>
