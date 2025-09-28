<?php
include 'servidor.php';

$conect = conexao();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $turno = $_POST['turno'];
    $descricao = $_POST['descricao'];
    $status_carro = $_POST['status_carro'];  

    $query = "INSERT INTO `aluno` (nome, idade, cpf, turno, descricao) VALUES ('$nome', '$idade', '$cpf', '$turno', '$descricao')";
    $resultado = mysqli_query($conect, $query);

    if ($resultado) {
        $mensagem = "Aluno cadastrado com sucesso!";
        header("Location: index.php");
        if ($status_carro == 1) {
             $e =mysqli_insert_id($conect);
            header("Location: cadastroCarro.php?id_aluno=".$e);
            exit();
        }
    } else {
        $mensagem = "Erro ao cadastrar aluno: " . mysqli_error($conect);
    }
}
?>
