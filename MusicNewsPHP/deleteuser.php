<?php

//if(!isset($_SESSION)) session_start(); 
//if (!isset($_SESSION["USERNAME"])) header('Location: index.php');

$urlPOST = "http://localhost/seminarski/services/obrisikorisnika";
   $curl_post_data = array(
        'idkorisnik' => $_POST['idkorisnik']
        );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /seminarski/listusers.php');

?>