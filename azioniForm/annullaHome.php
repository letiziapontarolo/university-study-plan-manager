
<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$config = require __DIR__ . '/../config/database.local.php';

$con = mysqli_connect(
    $config['host'],
    $config['read_user'],
    $config['read_password'],
    $config['database']
);

if (!$con) {
    die('Errore di connessione al database.');
}

mysqli_set_charset($con, 'utf8mb4');

$query = "SELECT * FROM corsi WHERE Attivo='1'";
$result = mysqli_query($con, $query);

if (!$result) {
    mysqli_close($con);
    die('Errore durante il recupero dei corsi.');
}

while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION[$row["CID"]] = NULL;
}

mysqli_close($con);

header('Location: ../pagine/home.php');
exit;

?>
