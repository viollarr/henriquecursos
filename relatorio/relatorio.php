<?php

/* 

Adaptado de : http://www.phpfreaks.com/tutorials/114/0.php

*/


//Configuração da BD
$di=date("Y-m", mktime(0,0,0, date("m")-1, date("y")));
$mysql_host="localhost";
$mysql_login="henrique_henriqu";
$mysql_pass="1q2w3e";
$mysql_db="henrique_henrique";

$connect = mysql_connect($mysql_host, $mysql_login, $mysql_pass) or die ('Erro de conexão');
    mysql_select_db($mysql_db) or die ('Erro ao conectar-se a base de dados');

//Nome da tabela a ser exportada
$table="henrique_mail";

    $select = "SELECT `henrique_0001`,`henrique_0002`,`henrique_0003`,`henrique_0004` FROM ".$table." WHERE henrique_0002 LIKE '$di%' ORDER BY henrique_0002 ASC";                
    $export = mysql_query($select);
    $fields = mysql_num_fields($export); 
    
    for ($i = 0; $i < $fields; $i++) {
        $header .= mysql_field_name($export, $i) . "\t"; 
    }
        
    while($row = mysql_fetch_row($export)) {
        $line = '';
        foreach($row as $value) {                                            
            if ((!isset($value)) OR ($value == "")) {
                $value = "\t";
            } else {
                $value = str_replace('"', '""', $value);
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
        $data .= trim($line)."\n";
    }
    $data = str_replace("\r","",$data); 
    
    if ($data == "") {
        $data = "\n(0) Records Found!\n";                        
    }
    else{
        $hoje=date("m")- 1;
		$ano=date("Y");           
        header("Content-type: application/x-msdownload");
        header("Content-Disposition: attachment; filename=Entradas_mes_0".$hoje."_".$ano.".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo "$header\n$data";  
    }
?>