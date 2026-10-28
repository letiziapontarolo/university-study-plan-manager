<?php
if (session_status() !== PHP_SESSION_ACTIVE)
session_start();
?>

<!doctype html>
<html lang="it">

    <head>

        <meta charset="utf-8">
        <title>Fine</title>
        <meta name="author" content="Letizia Pontarolo" >
        <link rel="stylesheet" type="text/css" href="../altro/stile.css">

    </head>
    
    <body>

    <header class="titolo"><?php include '../altro/titolo.php'; ?></header>
    <div class="intestazione" ><?php include '../altro/intestazione.php'; ?></div>
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

if (!$result) {
    printf(
        "<p>Errore - query fallita: %s</p>\n",
        htmlspecialchars(mysqli_error($con))
    );
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION[$row["CID"]] = NULL;
    }

    echo "<div class='ok'>Hai compilato il tuo piano di studi!</div></div>";
}

echo "<footer>";
include '../altro/footer.php';
echo "</footer></body></html>";

mysqli_close($con);

?>

