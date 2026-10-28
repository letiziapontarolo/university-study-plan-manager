
<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (
    ($_SESSION['loggato'] ?? false) !== true ||
    ($_SESSION['studenteOResponsabile'] ?? '') !== 'responsabile'
) {
    header('Location: ../pagine/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pagine/gestione.php');
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$corsoDiLaurea = trim($_POST['corsoDiLaurea'] ?? '');
$codice = trim($_POST['codice'] ?? '');
$cfu = trim($_POST['cfu'] ?? '');
$ore = trim($_POST['ore'] ?? '');

$attivo = 1;

$_SESSION['nuovoCorso'] = '';

$e1 = '/^(?!.*  )[a-zA-Z0-9 -]{5,30}$/';
$e2 = '/^(INF|GES|ARC|DES)$/';
$e3 = '/^[0-9]{2}[A-Z]{2}$/';
$e4 = '/^([1-9]|10)$/';
$e5 = '/^(9|[1-8][0-9]|90)$/';

if (
    !preg_match($e1, $nome) ||
    !preg_match($e2, $corsoDiLaurea) ||
    !preg_match($e3, $codice) ||
    !preg_match($e4, $cfu) ||
    !preg_match($e5, $ore)
) {
    $_SESSION['nuovoCorso'] = 'no';

    header('Location: ../pagine/gestione.php');
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

$query = "INSERT INTO corsi
          (Nome, Laurea, CID, Crediti, Ore, Attivo)
          VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $query);

if (!$stmt) {
    mysqli_close($con);
    die('Errore durante la preparazione della query.');
}

$cfu = (int) $cfu;
$ore = (int) $ore;

mysqli_stmt_bind_param(
    $stmt,
    'sssiii',
    $nome,
    $corsoDiLaurea,
    $codice,
    $cfu,
    $ore,
    $attivo
);

$inserimentoRiuscito = mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($con);

if (!$inserimentoRiuscito) {
    $_SESSION['nuovoCorso'] = 'no';

    header('Location: ../pagine/gestione.php');
    exit;
}

$_SESSION['nuovoCorso'] = 'si';

header('Location: ../altrePagine/successo.php');
exit;

?>
