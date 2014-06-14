<?php

session_start(); //inicia dados de sessѕes

echo "<input type='hidden' name='verificacao' value='".$_SESSION['rand_code']."'/>"; //input hidden para verificaчуo

?>