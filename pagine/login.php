<?php
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
?>

<!doctype html>

<html lang="it">

<head>

    <meta charset="utf-8">
    <title>Login</title>
     <meta name="author" content="Letizia Pontarolo" >
     <link rel="stylesheet" type="text/css" href="../altro/stile.css">

</head>

<body>

<header class="titolo"><?php include '../altro/titolo.php'; ?></header>

 <div class="intestazione" ><?php include '../altro/intestazione.php'; ?></div>

   <h2>Login</h2>

   <div class="menu" ><?php include '../altro/menu.php'; ?></div>
  
   <div class="centro">

   
<form name="f1" action="../azioniForm/azioneLogin.php" method="post">
     <p>Inserire la matricola: <input type="text" name="m" value="<?php if (isset($_COOKIE["matricola"])) {echo $_COOKIE["matricola"];}    ?>"></p>
     <p>Inserire la password: <input type="password" name="password" value=""></p>
     <p>
     <input type="submit" name="bottone" value="INVIA">
     <input type="submit" name="bottone" value="CANCELLA">
    </p>
    </form>

<?php
if (isset($_SESSION[ "fail" ])) {
  if ($_SESSION[ "fail" ] == "si") {
    echo "<div class='warning'>Autenticazione fallita: matricola o password errati!</div>";
  }
}

if (isset($_SESSION["vuoto"]) && $_SESSION["vuoto"] === "si") {
    echo "<div class='warning'>Autenticazione fallita: matricola o password mancanti!</div>";
}

?>
</div>
  <footer><?php include '../altro/footer.php'; ?></footer>
  </body>
</html>