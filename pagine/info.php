<?php
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
?>

<!doctype html>
<html lang="it">

    <head>

        <meta charset="utf-8">
        <title>Info</title>
        <meta name="author" content="Letizia Pontarolo" >
        <link rel="stylesheet" type="text/css" href="../altro/stile.css">

    </head>
   
    <body>
    <header class="titolo"><?php include '../altro/titolo.php'; ?></header>
    <div class="intestazione" ><?php include '../altro/intestazione.php'; ?></div>
		<h2 id="info" >Info</h2>
    <div class="menu" ><?php include '../altro/menu.php'; ?></div>

    <div class="centro">

<?php

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

  $query = "SELECT * FROM corsi WHERE Attivo='1'";
  $result = mysqli_query($con, $query);
  if (! $result)
   printf ("<p>errore – query fallita: %s<p>\n", mysqli_error($con));
  else
  echo "<h3>Elenco dei corsi:</h3>";

if (isset($_SESSION[ "loggato" ])) { 
    if (!$_SESSION[ "loggato" ]) {
      while ($row = mysqli_fetch_assoc($result))
          echo "<p>- ".$row["Nome"]." (".$row["Laurea"].")</p>";
        }
      else {
        while ($row = mysqli_fetch_assoc($result))
          echo "<p>- ".$row["Nome"]." (".$row["Laurea"]." - ".$row["CID"]." - ".$row["Crediti"]." crediti - ".$row["Ore"]." ore)</p>";
      }
  }
  else {
    while ($row = mysqli_fetch_assoc($result))
          echo "<p>- ".$row["Nome"]." (".$row["Laurea"].")</p>";
  }


  mysqli_close($con);
?>


</div>

<footer><?php include '../altro/footer.php'; ?></footer>
</body>
</html>