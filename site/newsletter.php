<?php
include("conexao_db.php");
$email  = $_POST["email"];
$codigo = md5($email);
$tipo = $_GET['tipo'];
$email2 = $_GET['email2'];

if($email == ""){
echo "<script>alert('Preencha corretamente o campo de e-mail!');";
echo "location.href='http://www.henriquecursos.com/site/home.php'</script>";
}
else {
$sql = mysql_query("SELECT * FROM n_emails WHERE email = '$email'");
 if(mysql_num_rows($sql)==1){
echo "<script>alert('E-mail já cadastrado no sistema');";
echo "location.href='http://www.henriquecursos.com/site/home.php'</script>";
 } 
 else{
 	if (ereg("@",$email) || $tipo == ""){
 $codigo = sha1($codigo);
 mysql_query("INSERT INTO n_emails(id,email,codigo,ativo) VALUES
 ('','$email','$codigo','s')") or die(mysql_error());
 $cabecalho  = "From: $a_email";
 $cabecalho .= "\nContent-Type: Text/HTML";
 $msg = "<font face=Arial size=2>";
 $msg .= "Olá <b>$email</b>,";
 $msg .= "<br><br>";
 $msg .= "Você está recebendo esta mensagem porque você se cadastrou";
 $msg .= " na lista do site <a href='$url' target=_blank><b>$titulo</b></a><br><br>";
 $msg .= "</font>";
 mail($email,$confirm_assunto,$msg,$cabecalho);
  echo "<script>alert('E-mail cadastrado com sucesso! Agora já faz parte de nossa lista.');";
  echo "location.href='http://www.henriquecursos.com/site/home.php'</script>";
  }
 echo "<script>alert('Preencha com um e-mail válido!');";
 echo "location.href='http://www.henriquecursos.com/site/home.php'</script>"; 
 }
}
?>
