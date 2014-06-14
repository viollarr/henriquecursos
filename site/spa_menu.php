

<?
####################################
## Desenvolvido: Victor Narcizo   ##
## data: 10/07/2008               ##
## Web Master                     ##
####################################

// AQUI PEGA A VARIÁVEl VINDA DA URL

$tipo	=	$_GET['tipo'];

//VERIFICA QUAL O TIPO E EXECUTA A FUNÇÃO

if ($tipo = 1){
	header("Location:spa_pele.html");
}
elseif ($tipo = 2){
	echo"spa_hidratação";
}
elseif($tipo = 3){
	echo"spa_redução";
}
elseif ($tipo = 4){
	echo"spa_relaxamento";
}
elseif($tipo = 5){
	echo"spa_principio_ataivo";
}
elseif ($tipo = 6){
	echo"spa_naturoterapêutico";
}
elseif($tipo = 7){
	echo"spa_gestante";
}
elseif ($tipo = 8){
	echo"spa_bebê";
}
elseif($tipo = 9){
	echo"spa_gestão";
}
elseif ($tipo = 10){
	echo"spa_estetica";
}
else {
	echo"selecione um dos pagamentos";
}

?>