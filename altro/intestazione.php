<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    }
if (isset($_SESSION[ "loggato" ])) {
  if ($_SESSION[ "loggato" ] = true) {
    if ($_SESSION[ "studenteOResponsabile" ] == "studente") {
     echo "<p>Matricola: ".$_SESSION[ "matricola" ]."</p>";
     echo "<p>Crediti: ".$_SESSION[ "crediti" ]."</p>";  }
   else {
     echo "<p>Matricola: ".$_SESSION[ "matricola" ]."</p>";
     echo "<p>Crediti: NA</p>";   }
     } 
     else {
      echo "<p>Matricola: ANON</p>";
      echo "<p>Crediti: 0</p>";  }
    }
 else {
   echo "<p>Matricola: ANON</p>";
   echo "<p>Crediti: 0</p>";  }
?>