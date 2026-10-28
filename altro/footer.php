<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    }
    $tags = get_meta_tags('../pagine/home.php');
    echo "<p>Nome file: ".basename($_SERVER['PHP_SELF'])."</p><p>Autore: ".$tags['author']."</p>";
?>