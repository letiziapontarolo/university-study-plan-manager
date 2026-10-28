<?php
if (session_status() !== PHP_SESSION_ACTIVE)
session_start();
?>

<!doctype html>
<html lang="it">

    <head>
    
        <meta charset="utf-8">
        <title>Conferma</title>
        <meta name="author" content="Letizia Pontarolo" >
        <link rel="stylesheet" type="text/css" href="../altro/stile.css">

    </head>
    
    <body>

    <header class="titolo"><?php include '../altro/titolo.php'; ?></header>
    <div class="intestazione" ><?php include '../altro/intestazione.php'; ?></div>
    
    <div class="menu" ><?php include '../altro/menu.php'; ?></div>

    <div class="centro">

<?php
$corsoExtra = false;
echo "<h2>Corsi selezionati:</h2>";

$config = require __DIR__ . '/../config/database.local.php';

$con = mysqli_connect(
    $config['host'],
    $config['read_user'],
    $config['read_password'],
    $config['database']
);

if (!$con) {
    die('<p>Errore di connessione al database.</p>');
}

mysqli_set_charset($con, 'utf8mb4');

    $query = "SELECT * FROM corsi";
    $result = mysqli_query($con, $query);
    if (! $result)
     printf ("<p>errore – query fallita: %s<p>\n", mysqli_error($con));
    else
    while ($row = mysqli_fetch_assoc($result)) {
      $_SESSION[$row["CID"]] = NULL;
      if (isset($_REQUEST[$row["CID"]])) {
        if ($_SESSION["corso"]!=$row["Laurea"]) {
          $corsoExtra = true;
    }
   }
  }
    $query = "SELECT * FROM corsi";
    $result = mysqli_query($con, $query);
    if (! $result)
     printf ("<p>errore – query fallita: %s<p>\n", mysqli_error($con));
    else
    $_SESSION["totale"] = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      if (isset($_REQUEST[$row["CID"]])) {
        $_SESSION["totale"] = $_SESSION["totale"] + $row["Crediti"];
        $_SESSION[$row["CID"]] = $row["Nome"];
        echo "<p>- ".$_REQUEST[$row["CID"]]."</p>";
  }
}
echo "<div class='totaleCrediti'>Totale crediti: ".$_SESSION["totale"]."</div>";
if ($corsoExtra == true) {
  if ($_SESSION["totale"] < $_SESSION[ "crediti" ]) {
    echo "<div class='warning'>Il numero di crediti complessivo deve essere maggiore o uguale al carico residuo!</div>";
    echo "<form name='f5' action='../azioniForm/indietro.php'>
    <div class='pulsante'><input type='submit' value='INDIETRO'></div></form>";
  }
  else {
    echo "<form name='f6' action='fine.php'>
    <div class='pulsante'><input type='submit' value='CONFERMA PIANO DI STUDIO'></div></form>";
          echo "<form name='f8' action='../azioniForm/indietro.php'>
          <div class='pulsante'><input type='submit' value='INDIETRO'></div></form>";
  }

}
else {
  echo "<div class='warning'>Devi selezionare almeno un corso non afferente il tuo corso di laurea!</div>";
  echo "<form name='f8' action='../azioniForm/indietro.php'>
  <div class='pulsante'><input type='submit' value='INDIETRO'></div></form>";
}

echo "<form name='f7' action='../azioniForm/annullaHome.php'>
<div class='pulsante'><input type='submit' value='ANNULLA'></div></form></div>";

echo "<footer>"; 
include '../altro/footer.php'; 
echo "</footer></body></html>";
mysqli_close($con);
?>
