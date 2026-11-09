<?php
session_start();
session_unset();
session_destroy();

header("Location: ../../FRONTED/INDEX/LOGIN/InicioDeSesion.php");
exit();
?>