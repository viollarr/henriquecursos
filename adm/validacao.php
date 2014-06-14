<?
include_once('includes/conexao_db.php');


$id = $_GET['id'];
$tipo_id = $_POST['tipo_id'];
$local = $_POST['local'];
$endereco = $_POST['endereco'];
$horario = $_POST['horario'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$link = $_POST['link'];
$inscricoes = $_POST['inscricoes'];
$sql = "UPDATE calendario SET local='$local',endereco='$endereco',horario='$horario',dia='$dia',mes='$mes',ano='$ano',link='$link',inscricoes='$inscricoes' WHERE id='$id'";
mysql_query($sql);


header("location:lista_calendario.php?id=$tipo_id");


?>