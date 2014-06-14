<?
include_once('verifica.php') ;

include_once('includes/tbs_class.php') ;



$id = $_GET['id'];
$teste = 1;

$TBS = new clsTinyButStrong ;
$TBS->LoadTemplate('html/inc_calendario.htm') ;


$TBS->Show();







?>