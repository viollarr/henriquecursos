<?

                        
			  $id=$_POST['id'];
			# $id = isset($_GET['id']) ? $_GET['id'] : '';
			 # $id = $_POST["id"];
              include('includes/bd.php');
              $sql = "select nome from cursos where id='$id'";  
	          $resultado = mysql_query($sql);
			  $output = mysql_fetch_row($resultado);			     
			

$nome    = $_POST["nome"];
$email   = $_POST["email"];
$curso   = $_POST["cursos"];

global $email; //fun��o para validar a vari�vel $email no script todo

$data      = date("d/m/y");                     //fun��o para pegar a data de envio do e-mail
$ip        = $_SERVER['REMOTE_ADDR'];           //fun��o para pegar o ip do usu�rio
$assunto    = "Calend�rio dos Cursos"; 			//Assunto da mensagen
$hora      = date("H:i");                       //para pegar a hora com a fun��o date
$mensag		= "Quero saber novidades de quando houver no calend�rio novos cursos de";
$mensagnao  = "N�o quero saber novidades de quando houver no calend�rio novos cursos de";


if(isset($_POST["ativar"]))
{
//aqui envia o e-mail para voc�
mail ("isis@henriquecursos.com",                       //email aonde o php vai enviar os dados do form
      "$assunto",
      "Nome: $nome\nData: $data\nIp: $ip\nHora: $hora\nE-mail: $email\n\n\n $mensag $output[0].",
      "From: $email"
     );
/*
//aqui s�o as configura��es para enviar o e-mail para o visitante
$site   = "$email";                    //o e-mail que aparecer� na caixa postal do visitante
$titulo = "RE:Contato";                  //titulo da mensagem enviada para o visitante
$msg    = "$nome, obrigado por entrar em contato conosco, em breve entraremos em contato";

aqui envia o e-mail de auto-resposta para o visitante
mail("$email",
     "$titulo",
     "$msg",
     "From: $site"
    );
*/	
//echo "<p align=center>$nome, sua mensagem foi enviada com sucesso!</p>";
//echo "<p align=center>Estaremos retornando em breve.</p>";
//echo "<p align=center><a href ='http://www.henriquecursos.com/site/home.php'>voltar";
header("Location: http://www.henriquecursos.com/site/home.php");
}
else
{

mail ("isis@henriquecursos.com",                       //email aonde o php vai enviar os dados do form
      "$assunto",
      "Nome: $nome\nData: $data\nIp: $ip\nHora: $hora\nE-mail: $email\n\n\n $mensagnao $output[0].",
      "From: $email"
     );
   // echo "Voc� n�o quer receber novidades por email...";
	header("Location: http://www.henriquecursos.com/site/home.php");
}

?>
