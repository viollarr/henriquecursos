<?
include_once('verifica.php') ;

include_once('includes/tbs_class.php') ;
include_once('includes/conexao_db.php') ;


$id = $_GET['id'];
$teste = 1;

$TBS = new clsTinyButStrong ;
$TBS->LoadTemplate('html/alt_calendario.htm') ;
$TBS->MergeBlock('bloco1',$cnx_id,"SELECT * FROM calendario WHERE id='$id'") ; 
$TBS->MergeBlock('option1',$cnx_id,"SELECT inscricoes FROM calendario WHERE id='$id'") ; 


//$t1 = mysql_query("SELECT inscricoes FROM calendario WHERE id='$id'");



$TBS->Show();







?>