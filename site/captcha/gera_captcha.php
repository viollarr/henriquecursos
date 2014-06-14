<?php
/*
# Criado por : Rudolf Kroker Junior
# Website: PHPTech.com.br
# Data 17/04/2013
 
#Iniciamos a SESSION para poder gravar as informa��es como o "c�digo" que ser� criado
*/
session_start();
 
#Criamos uma vari�vel aonde iremos inserir esse c�digo do captcha
$string = '';
 
/*
Aqui temos que criar um c�digo randomico para o captcha
*/
for ($i = 0; $i < 5; $i++) {
 // os n�meros aqui s�o refer�ncia � tabela ASCII (tudo em lower case)
 $string .= chr(rand(97, 122));
}
 
// Criamos a session com este c�digo
$_SESSION['rand_code'] = $string;
 
// Dizemos aonde as fontes est�o localizadas para criar a imagem do captcha
$dir = 'fonts/';
 
// definimos o tamanho da imagem, cores, e afins
$image = imagecreatetruecolor(170, 60);
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 200, 100, 90); // vermelho
$white = imagecolorallocate($image, 255, 255, 255);
 
/*
# E agoar vamos criar a imagem com as configura��es feitas acima. Al�m de definir a fonte, ou seja
# quando voc� v� aquelas fontes absurdas em captchas, � por que algu�m esta usando uma fonte absurda
# para criar o bendido captcha ent�o fica a seu crit�rio definir a fonte que lhe convem
# basta alterar o "arial.ttf" para a fonte escolhida, de prefer�ncia uma que seja TTF.
*/
imagefilledrectangle($image,0,0,399,99,$white);
imagettftext ($image, 30, 0, 10, 40, $color, $dir."arial.ttf", $_SESSION['rand_code']);
 
// Lan�amos um header dizendo que esta "p�gina � uma imagem"
header("Content-type: image/png");
// Lan�amos a imagem
imagepng($image);
 
?>