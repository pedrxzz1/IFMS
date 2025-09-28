<?php
function conexao(){
    $servidor="localhost";
    $usuario="root";
    $senha="";
    $database="cadastro_ifms"; 

    $conect = new mysqli($servidor, $usuario, $senha, $database);

    
    if ($conect->connect_error) {
        die("Conexão falhou: " . $conect->connect_error);
    }
    return $conect;
}

?>
