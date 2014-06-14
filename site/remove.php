<?
$email = $_GET["email"];
include("conexao_db.php");
mysql_query("DELETE FROM n_emails WHERE email = '$email'");
echo "<script>location.href='enviar_noticia.php'</script>";

?>
