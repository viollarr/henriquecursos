<?
include_once('includes/tbs_class.php') ;

$TBS = new clsTinyButStrong ;
$TBS->LoadTemplate('templates/index_cpf.html');

// Regras de Validação...a

if (!isset($_POST)) $_POST=&$HTTP_POST_VARS ;

//Verifica se o campo do c.p.f tá vazio, se estiver zeratudo
if (!isset($_POST['x_name1'])) 
 {
  $x_name1 = '' ;
  $msg_text = 'Digite seu C.P.F e um e-mail válido para se cadastrar !' ;
 }
else 
 {
  $x_name1 = ereg_replace("[^0-9]", "", $_POST['x_name1']);//Tirando qq coisa que não seja número

  if (strlen($x_name1)!=11) // Verifica se tem 11 caracteres para então checar a validade
   {
    $msg_text = 'C.P.F. Inválido !!!!' ;
   }
  else
   {
     //Valores de C.P.F proibídos !!!
     $nulos = array("12345678909","11111111111","22222222222","33333333333", "44444444444","55555555555","66666666666","77777777777", "88888888888","99999999999","00000000000");
     //Verifica se algum dos valores acima corresponde ao c.p.f e diz inválido novamente.
     if(in_array($x_name1, $nulos))
	  {
	  $msg_text = 'C.P.F. Inválido !!!!' ;
      }
	 else
	  {
       //validando C.P.F
       $dv = substr($x_name1,-2);
                 for ($i=0; $i<9; $i++)
                       $acum+=$x_name1[$i]*(10-$i);
                 $x=$acum % 11;
                 $acum = ($x>1) ? (11 - $x) : 0;
                 $compdv = $acum * 10;
                 
                 $acum=0;
                 for ($i=0; $i<10; $i++)
                       $acum+=$x_name1[$i]*(11-$i); 
                 $x=$acum % 11;
                 $acum = ($x>1) ? (11 - $x) : 0;
                 $compdv = $compdv + $acum; 
				 
                 // Verifica se o digito verificador bate com o cálculo efetuado
				 if($compdv == $dv)
				  {
				   $cpf = "ok"; // Varaável para dizer que tá tudo ok !!!
				  }
	  }
   }
 }

// Validando o e-mail
if (!isset($_POST['x_name2'])) 
 {
  $x_name2 = '' ;
 }
  $x_name2 = strtolower($_POST['x_name2']);

  if (eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]{2,3}$", $x_name2))
   {
	$email = "ok";
   }

if ($cpf =="ok" and $email =="ok") {$msg_text = "C.P.F e E-mail ok !!!";}
elseif (isset($_POST['x_name1'])) {$msg_text = "C.P.F ou E-mail inválidos !!!";}

$TBS->Show() ;

?>

