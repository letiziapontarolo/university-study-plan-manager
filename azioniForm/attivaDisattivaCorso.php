
<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (
    !isset($_SESSION['loggato']) ||
    $_SESSION['loggato'] !== true ||
    ($_SESSION['studenteOResponsabile'] ?? '') !== 'responsabile'
) {
    header('Location: ../pagine/login.php');
    exit;
}

$config = require __DIR__ . '/../config/database.local.php';

$con = mysqli_connect(
    $config['host'],
    $config['write_user'],
    $config['write_password'],
    $config['database']
);

if (!$con) {
    die('Errore di connessione al database.');
}

mysqli_set_charset($con, 'utf8mb4');

$query = "SELECT * FROM corsi";
$result = mysqli_query($con, $query);

if (!$result) {
    mysqli_close($con);
    die('Errore durante il recupero dei corsi.');
}

while ($row = mysqli_fetch_assoc($result)) {

    $cid = $row['CID'];

    if (isset($_POST[$cid])) {

        $azione = $_POST[$cid];

        if ($azione === 'ATTIVA') {
            $nuovoStato = '1';
        } elseif ($azione === 'DISATTIVA') {
            $nuovoStato = '0';
        } else {
            continue;
        }

        $query2 = "UPDATE corsi SET Attivo = ? WHERE CID = ?";

        $stmt = mysqli_prepare($con, $query2);

        if (!$stmt) {
            mysqli_close($con);
            die('Errore durante la preparazione della query.');
        }

        mysqli_stmt_bind_param($stmt, 'ss', $nuovoStato, $cid);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        break;
    }
}

mysqli_close($con);

header('Location: ../pagine/gestione.php');
exit;

?>
