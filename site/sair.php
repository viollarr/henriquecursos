<?php

session_start();

session_unregister($_SESSION['sativo']);

session_destroy();
header("Location:home.php");

?>