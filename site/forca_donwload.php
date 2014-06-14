<?php
    define('DIR_DOWNLOAD', 'academico/'); // Aqui vale qualquer coisa :)
     
    $arquivo = $_GET['arquivo'];
    if (stripos($arquivo, './') !== false || stripos($arquivo, '../') !== false || !file_exists(DIR_DOWNLOAD.$arquivo))
        exit('Operação não permitida.');
 
    $arquivo = DIR_DOWNLOAD.$arquivo; // Aqui a gente só junta o diretório com o nome do arquivo
 
    header('Content-type: octet/stream');
    header('Content-disposition: attachment; filename="'.basename($arquivo).'";');
    header('Content-Length: '.filesize($arquivo));
    readfile($arquivo);
    exit;
?>