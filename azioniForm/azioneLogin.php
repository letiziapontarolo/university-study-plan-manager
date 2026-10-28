
<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$bottone = $_POST['bottone'] ?? $_GET['bottone'] ?? '';

switch ($bottone) {

    case 'CANCELLA':
        $_SESSION['vuoto'] = '';
        $_SESSION['fail'] = '';

        setcookie('matricola', '', time() - 3600, '/');

        header('Location: ../pagine/login.php');
        exit;

    case 'INVIA':
        $_SESSION['vuoto'] = '';
        $_SESSION['fail'] = '';

        $m = $_POST['m'] ?? '';
        $p = $_POST['password'] ?? '';

        if ($m === '' || $p === '') {
            $_SESSION['vuoto'] = 'si';
            header('Location: ../pagine/login.php');
            exit;
        }

        $_SESSION['fail'] = 'si';

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

        $query = "SELECT * FROM utenti
                  WHERE Matricola = ? AND Password = ?";

        $stmt = mysqli_prepare($con, $query);

        if (!$stmt) {
            mysqli_close($con);
            die('Errore durante la preparazione della query.');
        }

        mysqli_stmt_bind_param($stmt, 'ss', $m, $p);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);
        mysqli_close($con);

        if (!$row) {
            header('Location: ../pagine/login.php');
            exit;
        }

        session_regenerate_id(true);

        $_SESSION['fail'] = 'no';
        $_SESSION['vuoto'] = 'no';
        $_SESSION['loggato'] = true;

        $_SESSION['matricola'] = $row['Matricola'];
        $_SESSION['nome'] = $row['Nome'];
        $_SESSION['cognome'] = $row['Cognome'];
        $_SESSION['corso'] = $row['Corso'];
        $_SESSION['crediti'] = $row['Crediti'];

        setcookie(
            'matricola',
            $_SESSION['matricola'],
            [
                'expires' => time() + 48 * 3600,
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax'
            ]
        );

        $tipo = substr($_SESSION['matricola'], 0, 1);

        if ($tipo === 'r') {
            $_SESSION['studenteOResponsabile'] = 'responsabile';

            header('Location: ../pagine/gestione.php');
            exit;
        }

        if ($tipo === 's') {
            $_SESSION['studenteOResponsabile'] = 'studente';

            header('Location: ../pagine/piano.php');
            exit;
        }

        $_SESSION = [];
        session_destroy();

        header('Location: ../pagine/login.php');
        exit;

    default:
        header('Location: ../pagine/login.php');
        exit;
}
