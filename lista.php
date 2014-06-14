<?
include_once("includes/tbs_class.php") ;

//Connexion to the database
require('includes/bd.php');

// Se a vari�vel n�o exite zera
if (array_key_exists("email",$_GET))
 {
   $email = $_GET["email"] ;
 }
else 
 {
   $email = "" ;
 } ;


// Se a vari�vel n�o exite zera
if (array_key_exists("datahora",$_GET))
 {
   $datahora = $_GET["datahora"] ;
 }
else 
 {
   $datahora = "" ;
 } ;


//Default value
if (array_key_exists("PageNum",$_GET))
 {
   $PageNum = $_GET["PageNum"] ;
 }
else 
 {
   $PageNum = 1 ;
 } ;

//Default value
if (array_key_exists("RecCnt",$_GET)) {
  $RecCnt = intval($_GET["RecCnt"]) ;
} else {
  $RecCnt = -1 ;
} ;

if (isset($email) and $email <> "")
   {
    $cnx_select = "SELECT * FROM henrique_mail WHERE henrique_0001 ='$email'";
   }

if (isset($datahora) and $datahora <> "")
   {
    $cnx_select = "SELECT * FROM henrique_mail WHERE henrique_0002 LIKE '%$datahora%'";
   }


if (isset($ipuser) and $ipuser <> "")
   {
    $cnx_select = "SELECT * FROM henrique_mail WHERE henrique_0003 ='$ipuser'";
   }

if (isset($PageSearch))
   {
    $cnx_select = "SELECT * FROM henrique_mail WHERE LIKE '%$PageSearch%'";
   }
Else 
   {
    $cnx_select = "SELECT * FROM henrique_mail";
   }





if (isset($PageSize)) {$PageSize = $PageSize;} Else {$PageSize = 10;} // N�mero de P�gina Exibidas

$PageVi = 5; // Aqui regula quantas p�ginas veremos na barra de navega��o

$TBS = new clsTinyButStrong ;
$TBS->LoadTemplate("lista.htm");

$RecCnt = $TBS->MergeBlock("blk", $wb_id, $cnx_select, $PageSize, $PageNum, $RecCnt);
          $TBS->MergeNavigationBar('nv',$PageVi,$PageNum,$RecCnt,$PageSize);

          $TBS->MergeBlock('blk1',$wb_id,'SELECT DISTINCT henrique_0001 FROM henrique_mail');

          $formatadata = "SELECT DISTINCT DATE_FORMAT(henrique_0002,'%Y-%m-%d') AS henrique_0002 FROM henrique_mail";
          $TBS->MergeBlock('blk2',$wb_id, $formatadata); 
  
          $TBS->MergeBlock('blk3',$wb_id,'SELECT DISTINCT henrique_0003 FROM henrique_mail'); 

$PageCnt = ceil($RecCnt / $PageSize); //Calculando o n�mero de p�ginas

$Rprim = ($PageNum * $PageSize) - $PageSize + 1 ; // N�mero do Primeiro Registro da P�gina

if ($PageCnt == $PageNum) {$Rsegu = $RecCnt;} Else {$Rsegu = $PageNum * $PageSize;} //Aqui regula o final dos registros, N�mero do �ltimo Registro da P�gina

//Display the list of pages
$TBS->MergeBlock("pg","num",$PageCnt) ;

mysql_close($wb_id);

$TBS->Show() ;
?>