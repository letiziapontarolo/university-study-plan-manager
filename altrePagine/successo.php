<?php
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
?>

<!doctype html>

<html lang="it">

    <head>

        <meta charset="utf-8">
        <title>Successo</title>
        <meta name="author" content="Letizia Pontarolo" >
        <link rel="stylesheet" type="text/css" href="../altro/stile.css">

    </head>
  
    <body>
    <header class="titolo"><?php include '../altro/titolo.php'; ?></header>
    <div class="intestazione" ><?php include '../altro/intestazione.php'; ?></div>
    <div class="menu" ><?php include '../altro/menu.php'; ?></div>

    <div class="centro">
<?php
echo "<div class='ok'>L'operazione ha avuto successo!</div>";
?>
</div>
<footer><?php include '../altro/footer.php'; ?></footer>
</body></html>
