<?php

session_start(); //inicia dados de sess�es

echo "<input type='hidden' name='verificacao' value='".$_SESSION['rand_code']."'/>"; //input hidden para verifica��o

?>