<?php



Header( 'Content-Type: text/html; charset=ISO-8859-1' );



//	Inicia sess�o

	session_start();



//	Inclui e est�ncia classe para XSS

	require_once( "class.inputFilter.php" );

	$Filtro = new InputFilter();



/*



//	Inclui e est�ncia classe para captcha

	define('CHECKSPAM_DIR','./checkspam/');  

	require_once( CHECKSPAM_DIR . "class.checkSpam.php" );

	$cs = new checkspam;

	$cs->init_session();

*/





/*



//	Variaveis de mensagem

	$Error = false;

	$ErrorMsg = array();







	if ( isset( $_POST['txtMensagem'] ) ) 

	{

		if ( count( $_POST ) > 0 ) {	

			$_POST = $Filtro->process($_POST);



			foreach ( $_POST as $Chave=>$Valor ) {

				trim( $Valor );

				if ( ( $Chave == "txtNome" || $Chave == "txtEmail" || $Chave == "txtMensagem" ) && strlen( $Valor ) < 1 ) 

				

 // como estava antes -> if ( ( $Chave == "txtNome" || $Chave == "txtEmail" || $Chave == "txtMensagem" || $Chave == "Validacao" ) && strlen( $Valor ) < 1 ) 

				{

					$Error = true;

					$ErrorMsg[0] = "Campos obrigat�rios em branco";

				}	

				else if ( strlen( $Valor ) > 0 ) 

				{

				

				

					if ( $Chave == "txtEmail" ) 

					{

						if ( !ereg( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" , strtolower( $Valor ) ) )

						{

							$Error = true;

							$ErrorMsg[2] = "Email inv�lido";

						}

					}

					if ( $Chave == "txtMensagem" ) 

					{

						if ( strlen( $Valor ) > 400 )

						{

							$Error = true;

							$ErrorMsg[3] = "A mensagem deve conter entre 20 e 400 caract�res";

						}

					}

					

					

					if ( $Chave == "Validacao" && !$cs->verify($Valor) )

					{

					

					$Error = true;

						$ErrorMsg[4] = "Por favor, verifique o c�digo de verifica��o";

					

					}

					

		

					

				 }

			 }



			if ( $Error != true )

			{	







*/



$Error = true;



			//	Inclui e est�ncia classe para envio de e-mail

				require_once( "class.mMail.php" );

				$Email = new mMail();

				$EmailG = new mMail();



				//	Data e hora de envio

				$DataHora = date("d/m/Y - H:i:s");



				$optDomailing = ( $_POST['optDomailing'] == 1 ) ? "Sim" : "N�o";

				$optEstudante = ( $_POST['optEstudante'] == 1 ) ? "Sim" : "N�o";

				$optGraduado = ( $_POST['optGraduado'] == 1 ) ? "Sim" : "N�o";

				$optPGraduado = ( $_POST['optPGraduado'] == 1 ) ? "Sim" : "N�o";

			

				$txtMsg = "Mensagem recebida pelo Contact Center do website.\n\n\nNome:\n--------------------\n" . $_POST["txtNome"] . "\n\nCidade:\n--------------------\n" . $_POST["txtCidade"] . "\n\nEstado:\n--------------------\n" . $_POST["cboEstado"] . "\n\nTelefone 1:\n--------------------\n" . $_POST["txtDDDRes"] . " " . $_POST["txtTelResidencial"] . "\n\nTelefone 2:\n--------------------\n" . $_POST["txtDDDRes2"] . " " . $_POST["txtTelResidencial2"] . "\n\nEmail:\n--------------------\n".$_POST["txtEmail"] . "\n\nMensagem:\n--------------------\n" . $_POST['txtMensagem'] . "\n\nUniversidade:\n--------------------\n" . $_POST['txtUniversidade'] . "\n\nEstudante:\n--------------------\n" . $optEstudante . "\n\nGradua��o:\n--------------------\n" . $optGraduado . "\n\nP�s Gradua��o:\n--------------------\n" . $optPGraduado . "\n\nQual ?:\n--------------------\n" . $_POST['txtQual'] . "\n\nDeseja Mailing List?\n--------------------\n" . $optDomailing . "\n\nHora enviada:\n--------------------\n" . $DataHora . "\n\nIP do usu�rio:\n--------------------\n" . $_SERVER['REMOTE_ADDR'] . "\n";

				

				//	Define assunto

				$Email->setSubject( "Contato Henrique Cursos" );

				$EmailG->setSubject( "Contato Henrique Cursos" );



				//	Define destinat�rio

				$Email->addTo( "profa.isis.maia@gmail.com" );

				$EmailG->addTo( "profa.isis.maia@gmail.com" );

				

				//	Define destinat�rio

				$Email->addTo( "profa.isis.maia@gmail.com" );

				$EmailG->addTo( "profa.isis.maia@gmail.com" );



				//	Define Remetente

				$Email->setFrom( $_POST['txtEmail'] );

				$EmailG->setFrom( $_POST['txtEmail'] );



				//	Define Resposta para

				$Email->setReplayTo( $_POST['txtEmail'] );

				$EmailG->setReplayTo( $_POST['txtEmail'] );



				//	Define conteudo da mensagem

				$Email->setTextBody( $txtMsg );

				$EmailG->setTextBody( $txtMsg );



				//	Envia mensagem

				$Email->send();				

				$EmailG->send();

				

				$_SESSION['Mensagens'] = "<strong>Mensagem enviada com sucesso ! Obrigado pelo contato</strong>";

				// $_SESSION['Post'] = array();

					

				

				Header("Location: http://www.henriquecursos.com/site/contact_center.php");



/*



			}

			else if ( $Error == true )

			{

					$Mensagens = "<strong>Alguns erros foram encontrados:</strong><br /> - ".implode(";<br /> - ", $ErrorMsg);

			}

		}

		else

		{

 			$Mensagens = "Informa��es para envio insuficientes.";

		}

	}

	*/



/*

	if ( $Error == true || !isset( $_POST['txtMensagem'] ) )

	{	

		if ( $Error == false )

		{

			$Mensagens = "Campos marcados com * s�o obrigat�rios.";

		}

	

	*/

		$_SESSION['Mensagens'] = $Mensagens;

		$_SESSION['Post'] = $_POST;

		 

	

		Header("Location: http://www.henriquecursos.com/site/contact_center.php");

	// }







?>