<?
include_once('includes/conexao_db.php');


$id = $_GET['id'];
$local = $_POST['local'];
$endereco = $_POST['endereco'];
$horario = $_POST['horario'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$link = $_POST['link'];
$inscricoes = $_POST['inscricoes'];


switch($id_tipo)
{
case 1: $nome_campo="Crochetagem"; break;
case 2: $nome_campo="Dermato Funcional"; break;
case 3: $nome_campo="Mobilização Neural"; break;
case 4: $nome_campo="Manipulação Articular"; break;
case 5: $nome_campo="Bandagem Funcional"; break;
case 6: $nome_campo="Drenagem Linfática Manual"; break;
case 7: $nome_campo="Anatomia Palpatória"; break;
case 8: $nome_campo="Fricção Transversa"; break;
case 9: $nome_campo="Massoterapia"; break;
case 10: $nome_campo="Auricoloterapia"; break;
case 11: $nome_campo="Eletropólise e Eletrolifting"; break;
case 12: $nome_campo="Pilates"; break;

default: $nome_campo="Crochetagem";
}
/*
$sql = "INSERT INTO calendario (tipo_id ,nome ,parametro ,local ,dia ,mes ,ano ,inscricoes ,link)
VALUES                     ('$id_tipo2', '$nome_campo', '1', '$local', '$dia', '$mes', '$ano', '$insc', '$link')";
*/



$sql = "INSERT INTO calendario (tipo_id, nome, parametro, local, endereco, horario, dia, mes, ano, inscricoes, link) 
                        VALUES ('$id', '$nome_campo', '1', '$local', '$endereco', '$horario', '$dia', '$mes', '$ano', '$inscricoes', '$link')";
        

mysql_query($sql);


header("location:lista_calendario.php?id=$id");






?>