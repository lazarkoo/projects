<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if(isset($_SESSION["USERNAME"]))
unset($_SESSION["USERNAME"]);  
header('Location: index.php');
?>