<?php
include 'servidor.php';
$conect = conexao();
$dados_com_carro = mysqli_query($conect, "SELECT * FROM `aluno` INNER JOIN `carro` ON aluno.id = carro.id_pessoa");
$dados_sem_carro = mysqli_query($conect, "SELECT * FROM `aluno` WHERE id NOT IN (SELECT id_pessoa FROM `carro`) ");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['solicitar_carona'])) {
    $id_aluno = $_POST['id_aluno'];
    header("Location: solicitarCarona.php?id_aluno=$id_aluno");
    exit();
}

function calcularVagasDisponiveis($id_veiculo, $conect) {
    $query_veiculo = "SELECT * FROM carro WHERE id = $id_veiculo";
    $dados_veiculo = mysqli_query($conect, $query_veiculo);
    
    if ($dados_veiculo && mysqli_num_rows($dados_veiculo) > 0) {
        $veiculo = mysqli_fetch_assoc($dados_veiculo);
        $id_veiculo = $veiculo['id'];
        $query_carona = "SELECT COUNT(*) as total_carona FROM carona WHERE id_veiculo = $id_veiculo";
        $dados_carona = mysqli_query($conect, $query_carona);
        $carona = mysqli_fetch_assoc($dados_carona);

        $capacidade_veiculo = $veiculo['quantidade_lugar'];
        $caronas_registradas = $carona['total_carona'];
        $vagas_disponiveis = $capacidade_veiculo - $caronas_registradas;

        return $vagas_disponiveis;
    } else {
        return "Informação não disponível";
    }
}
?>
