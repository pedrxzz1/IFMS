<?php
include 'servidor.php';

$conect = conexao();
$dados_sem_carro = mysqli_query($conect, "SELECT * FROM `aluno` WHERE id NOT IN (SELECT id_pessoa FROM `carro`) ");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query_veiculo = "SELECT * FROM carro WHERE id = $id";
    $dados_veiculo = mysqli_query($conect, $query_veiculo);

    if ($dados_veiculo && mysqli_num_rows($dados_veiculo) > 0) {
        $veiculo = mysqli_fetch_assoc($dados_veiculo);
        $id_veiculo = $veiculo['id'];

       $query_carona = "SELECT carona.id AS id_carona, aluno.id AS id_aluno, aluno.nome, aluno.idade, aluno.cpf, aluno.turno, aluno.descricao
                FROM carona 
                INNER JOIN aluno ON carona.Id_aluno = aluno.id 
                WHERE carona.id_veiculo = $id_veiculo";
   $dados_carona = mysqli_query($conect, $query_carona);

    if ($dados_carona && mysqli_num_rows($dados_carona) > 0) {
    $caronas = mysqli_fetch_all($dados_carona, MYSQLI_ASSOC);
   }

        $capacidade_veiculo = $veiculo['quantidade_lugar'];
        $caronas_registradas = isset($caronas) ? count($caronas) : 0;
        $vagas_disponiveis = $capacidade_veiculo - $caronas_registradas;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $id_pessoa = $_POST['id_pessoa'];
   
    $query_veiculo = "SELECT quantidade_lugar FROM carro WHERE id = $id";
    $dados_veiculo = mysqli_query($conect, $query_veiculo);
    $veiculo = mysqli_fetch_assoc($dados_veiculo);
    $capacidade_veiculo = $veiculo['quantidade_lugar'];
    
 
    $query_carona = "SELECT COUNT(*) as total_carona FROM carona WHERE id_veiculo = $id";
    $dados_carona = mysqli_query($conect, $query_carona);
    $carona = mysqli_fetch_assoc($dados_carona);
    $caronas_registradas = $carona['total_carona'];
    
    if ($caronas_registradas < $capacidade_veiculo) {
     $query_inserir_carona = "INSERT INTO carona (id_veiculo, Id_aluno) VALUES ($id, $id_pessoa)";
     $resultado_inserir_carona = mysqli_query($conect, $query_inserir_carona);
      
        if ($resultado_inserir_carona) {
            $mensagem = "Solicitação de carona enviada com sucesso!";
              header("Location: index.php");
        } else {
            $mensagem = "Erro ao enviar solicitação de carona: " . mysqli_error($conect);
        }
    } else {
        $mensagem = "Não há mais lugares disponíveis neste veículo.";
    }
}
?>
