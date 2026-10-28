<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    }
echo "<ul>
<li><a id='home2' href='../pagine/home.php'>Home</a></li>
<li><a id='info2' href='../pagine/info.php'>Info</a></li>";

if (isset($_SESSION[ "studenteOResponsabile" ])) {
  if ($_SESSION[ "studenteOResponsabile" ] == "responsabile") {
    echo '<li><a id="piano2OFF" href="javascript:void(0);">Piano</a></li>';
  }
  else {
    echo '<li><a id="piano2" href="../pagine/piano.php">Piano</a></li>';
  }
}
else {
  echo '<li><a id="piano2" href="../pagine/piano.php">Piano</a></li>';
}

if (isset($_SESSION[ "studenteOResponsabile" ])) {
if ($_SESSION[ "studenteOResponsabile" ] == "responsabile") {
  echo '<li><a id="gestione2" href="../pagine/gestione.php">Gestione</a></li>';
}
else {
  echo '<li><a id="gestione2OFF" href="javascript:void(0);">Gestione</a></li>';
}
}
else {
  echo '<li><a id="gestione2OFF" href="javascript:void(0);">Gestione</a></li>';
}


if (isset($_SESSION[ "loggato" ])) {
if ($_SESSION[ "loggato" ] = true) {
  echo '<li><a id="loginOFF" href="javascript:void(0);">Login</a></li>';
}
else {
  echo "<li><a id='loginON' href='../pagine/login.php'>Login</a></li>";
}
}
else {
  echo "<li><a id='loginON' href='../pagine/login.php'>Login</a></li>";
}

if (isset($_SESSION[ "loggato" ])) {
if ($_SESSION[ "loggato" ] = true) {
  echo "<li><a id='logoutON' href='../azioniForm/logout.php'>Logout</a></li>";
}
else {
  echo '<li><a id="logoutOFF" href="javascript:void(0);">Logout</a></li>';
} }
else {
  echo '<li><a id="logoutOFF" href="javascript:void(0);">Logout</a></li>';
}
echo '</ul>'
?>