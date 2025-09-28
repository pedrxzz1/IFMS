<?php
include 'servidor.php';

$conect = conexao();

$id_aluno = isset($_GET['id_aluno']) ? $_GET['id_aluno'] : null;
$query_verifica_aluno = "SELECT id FROM aluno WHERE id = $id_aluno";
$resultado_verifica_aluno = mysqli_query($conect, $query_verifica_aluno);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pessoa = $_POST['id_pessoa'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $quantidade_lugar = $_POST['quantidade_lugar'];
    $consumo_km = $_POST['consumo_km'];

    $query = "INSERT INTO `carro` (id_pessoa, marca, modelo, ano, cor, quantidade_lugar, consumo_km) VALUES ('$id_pessoa', '$marca', '$modelo', '$ano', '$cor', '$quantidade_lugar', '$consumo_km')";
    $resultado = mysqli_query($conect, $query);

    if ($resultado) {
        $mensagem = "Carro cadastrado com sucesso!";
         header("Location: index.php?id_aluno=");
    } else {
        $mensagem = "Erro ao cadastrar carro: " . mysqli_error($conect);
    }
}
?>

