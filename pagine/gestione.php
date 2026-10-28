
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (
    ($_SESSION['loggato'] ?? false) !== true ||
    ($_SESSION['studenteOResponsabile'] ?? '') !== 'responsabile'
) {
    header('Location: login.php');
    exit;
}
?>

<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <title>Gestione</title>
    <meta name="author" content="Letizia Pontarolo">
    <link rel="stylesheet" type="text/css" href="../altro/stile.css">
</head>

<body>

<header class="titolo"><?php include '../altro/titolo.php'; ?></header>
<div class="intestazione"><?php include '../altro/intestazione.php'; ?></div>

<h2 id="gestione">Gestione</h2>

<div class="menu"><?php include '../altro/menu.php'; ?></div>

<div class="grid-container">

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

$query = "SELECT * FROM corsi";
$result = mysqli_query($con, $query);

if (!$result) {
    mysqli_close($con);
    die('<p>Errore durante il recupero dei corsi.</p>');
}

echo "<div class='attivaDisattivaCorso'>
      <h3>Attiva/Disattiva corso</h3>
      <form name='f3'
            action='../azioniForm/attivaDisattivaCorso.php'
            method='post'>";

while ($row = mysqli_fetch_assoc($result)) {

    $nome = htmlspecialchars($row['Nome'], ENT_QUOTES, 'UTF-8');
    $laurea = htmlspecialchars($row['Laurea'], ENT_QUOTES, 'UTF-8');
    $cid = htmlspecialchars($row['CID'], ENT_QUOTES, 'UTF-8');
    $crediti = htmlspecialchars($row['Crediti'], ENT_QUOTES, 'UTF-8');
    $ore = htmlspecialchars($row['Ore'], ENT_QUOTES, 'UTF-8');

    $azione = ($row['Attivo'] == 1) ? 'DISATTIVA' : 'ATTIVA';

    echo "<p>
          $nome - $laurea - $cid - $crediti crediti - $ore ore
          <input type='submit' name='$cid' value='$azione'>
          </p>";
}

echo "</form></div>";

echo "<div class='inserisciNuovoCorso'>
      <h3 id='nuovoCorso'>Inserisci nuovo corso</h3>
      <form name='f4'
            action='../azioniForm/inserisciNuovoCorso.php'
            method='post'>

      <p>Nome: <input type='text' name='nome'></p>
      <p>Corso di laurea: <input type='text' name='corsoDiLaurea'></p>
      <p>Codice: <input type='text' name='codice'></p>
      <p>CFU: <input type='text' name='cfu'></p>
      <p>Ore: <input type='text' name='ore'></p>

      <input type='submit' value='CREA'>
      </form>";

if (($_SESSION['nuovoCorso'] ?? '') === 'no') {
    echo "<div class='warning'>
          I dati inseriti sono errati o mancanti!
          </div>";
}

echo "</div>";

mysqli_close($con);
?>

</div>

<footer><?php include '../altro/footer.php'; ?></footer>

</body>
</html>
