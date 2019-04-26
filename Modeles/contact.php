<?php
 function sendEmail($expediteur, $destinatair, $objet, $corp){
    ini_set("SMTP","smtp.bbox.fr");
    ini_set("smtp_port","25");
    ini_set("sendmail_from","admin.parking@m2l.com");

    error_reporting( E_ALL );

    $from = $expediteur;

    $to = $destinatair;

    $subject = $objet;

    $message = $corp;

    $headers = "De : " . $from . " A : " . $to ;

    mail($to,$subject,$message, $headers);
    //var_dump(mail($to,$subject,$message, $headers));
    header("location:contact");
    $send = "L'email a été envoyé.";
  return  $send ;
}
?>
