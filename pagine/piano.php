
<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>

<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <title>Piano</title>
    <meta name="author" content="Letizia Pontarolo">
    <link rel="stylesheet" type="text/css" href="../altro/stile.css">
</head>

<body>

<header class="titolo">
    <?php include '../altro/titolo.php'; ?>
</header>

<div class="intestazione">
    <?php include '../altro/intestazione.php'; ?>
</div>

<h2 id="piano">Piano</h2>

<div class="menu">
    <?php include '../altro/menu.php'; ?>
</div>

<div class="centro">

<?php

if (
    ($_SESSION['loggato'] ?? false) !== true ||
    ($_SESSION['studenteOResponsabile'] ?? '') !== 'studente'
) {

    echo "<div class='warning'>
          Attenzione! Questa pagina è accessibile
          soltanto agli studenti autenticati!
          </div>";

} else {

    echo "<h3>Definizione del carico didattico</h3>";

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

    if (!$result) {
        mysqli_close($con);
        die('<p>Errore durante il recupero dei corsi.</p>');
    }

    echo "<form name='f2'
                action='../altrePagine/conferma.php'
                method='post'>";

    while ($row = mysqli_fetch_assoc($result)) {

        $cid = htmlspecialchars(
            $row['CID'],
            ENT_QUOTES,
            'UTF-8'
        );

        $nome = htmlspecialchars(
            $row['Nome'],
            ENT_QUOTES,
            'UTF-8'
        );

        $laurea = htmlspecialchars(
            $row['Laurea'],
            ENT_QUOTES,
            'UTF-8'
        );

        $crediti = htmlspecialchars(
            $row['Crediti'],
            ENT_QUOTES,
            'UTF-8'
        );

        $checked = isset($_SESSION[$row['CID']])
            ? 'checked'
            : '';

        echo "<p>
              <input
                  type='checkbox'
                  id='$cid'
                  name='$cid'
                  value='$nome'
                  $checked
              >
              $nome - $laurea (Crediti: $crediti)
              </p>";
    }

    echo "<div class='pulsante'>
          <input type='submit' value='PROCEDI'>
          </div>
          </form>";

    echo "<form name='f10'
                action='../azioniForm/annullaPiano.php'>
          <div class='pulsante'>
          <input type='submit' value='ANNULLA'>
          </div>
          </form>";

    mysqli_close($con);
}

?>

</div>

<footer>
    <?php include '../altro/footer.php'; ?>
</footer>

</body>
</html>
