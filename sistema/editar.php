<?php
include 'servidor.php';

$conect = conexao();

$dados_todos_alunos = mysqli_query($conect, "SELECT * FROM aluno");
$dados_todos_carros = mysqli_query($conect, "SELECT * FROM carro");

// Verifica se foi selecionado um aluno para edição
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aluno_selecionado'])) {
        $id_aluno_selecionado = $_POST['aluno_selecionado'];

        // Obtém os dados do aluno selecionado
        $query_aluno_selecionado = "SELECT * FROM aluno WHERE id = $id_aluno_selecionado";
        $dados_aluno_selecionado = mysqli_query($conect, $query_aluno_selecionado);

        if ($dados_aluno_selecionado) {
            $aluno_selecionado = mysqli_fetch_assoc($dados_aluno_selecionado);
        } else {
            echo "Erro na consulta SQL: " . mysqli_error($conect);
        }
    }

// Processa o envio do formulário de edição
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar_aluno'])) {
        $id_aluno = $_POST['id_aluno'];
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $cpf = $_POST['cpf'];
        $turno = $_POST['turno'];
        $descricao = $_POST['descricao'];

        $query = "UPDATE aluno SET nome='$nome', idade='$idade', cpf='$cpf', turno='$turno', descricao='$descricao' WHERE id = $id_aluno";
        $resultado = mysqli_query($conect, $query);

        if ($resultado) {
            $mensagem = "Aluno atualizado com sucesso!";
            // Redireciona para a lista de alunos
            header("Location: index.php");
            exit();
        } else {
            $mensagem = "Erro ao atualizar aluno: " . mysqli_error($conect);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['carro_selecionado'])) {
        $id_carro_selecionado = $_POST['carro_selecionado'];

        // Obtém os dados do carro selecionado
        $query_carro_selecionado = "SELECT * FROM carro WHERE id = $id_carro_selecionado";
        $dados_carro_selecionado = mysqli_query($conect, $query_carro_selecionado);

        if ($dados_carro_selecionado) {
            $carro_selecionado = mysqli_fetch_assoc($dados_carro_selecionado);
        } else {
            echo "Erro na consulta SQL: " . mysqli_error($conect);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar_carro'])) {
        $id_carro = $_POST['id_carro'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        $cor = $_POST['cor'];
        $quantidade_lugar = $_POST['quantidade_lugar'];
        $consumo_km = $_POST['consumo_km'];
    
        $query = "UPDATE carro SET marca='$marca', modelo='$modelo', ano='$ano', cor='$cor', quantidade_lugar='$quantidade_lugar', consumo_km='$consumo_km' WHERE id = $id_carro";
        $resultado = mysqli_query($conect, $query);
    
        if ($resultado) {
            $mensagem = "Carro atualizado com sucesso!";
            // Redireciona para a lista de carros
            header("Location: index.php?id_aluno=");
            exit();
        } else {
            $mensagem = "Erro ao atualizar carro: " . mysqli_error($conect);
        }
    }
?>

