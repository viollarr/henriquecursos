<?
include_once('verifica.php') ;


include_once('includes/tbs_class.php') ;
include_once('includes/conexao_db.php') ;


$id = $_GET['id'];


$TBS = new clsTinyButStrong ;
$TBS->LoadTemplate('html/lista_calendario.htm') ;
$TBS->MergeBlock('bloco1',$cnx_id,"SELECT * FROM calendario WHERE tipo_id='$id' ORDER BY id DESC") ; 


$TBS->Show();


?>