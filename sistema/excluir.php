<?php
include 'servidor.php';

$conect = conexao();

$dados_todos_alunos = mysqli_query($conect, "SELECT * FROM aluno");
$dados_todos_carros = mysqli_query($conect, "SELECT * FROM carro");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_tipo'])) {
    $excluir_tipo = $_POST['excluir_tipo'];

    if ($excluir_tipo === 'aluno' && isset($_POST['aluno_selecionado'])) {
        $id_aluno_selecionado = $_POST['aluno_selecionado'];
         $mensagem = excluirTudo($id_aluno_selecionado);

      //  $id_aluno_selecionado = $_POST['aluno_selecionado'];
     //   $mensagem = excluir_aluno($id_aluno_selecionado);
    } 
    elseif ($excluir_tipo === 'carro' && isset($_POST['carro_selecionado'])) {
        $id_carro_selecionado = $_POST['carro_selecionado'];
        $mensagem = excluir_carro($id_carro_selecionado);
    }

    
}

function excluir_aluno($id_aluno) {
    $conect = conexao();

    $query_excluir_aluno = "DELETE FROM aluno WHERE id = $id_aluno";
    $resultado_excluir_aluno = mysqli_query($conect, $query_excluir_aluno);

    if ($resultado_excluir_aluno) {
        return "Aluno excluído com sucesso!";
        header("Location: index.php");
    } else {
        return "Erro ao excluir aluno: " . mysqli_error($conect);
    }
}




function excluirTudo($id_aluno){
    $conect = conexao();
    $verificar= mysqli_query($conect,"SELECT * FROM `aluno` WHERE $id_aluno NOT IN (SELECT id_pessoa FROM `carro`) "); 

    if(mysqli_num_rows( $verificar)){
        $result= mysqli_query($conect,"DELETE FROM aluno WHERE id = $id_aluno"); 

    }

    else{
        $conect = conexao();
        $result= mysqli_query($conect,"SELECT Carro.id FROM carro LEFT JOIN Aluno ON Carro.id =$id_aluno"); 

        $row = mysqli_fetch_assoc($result);
        $id_carro= $row['id'];

        $modifica= mysqli_query($conect,"UPDATE carona SET id_aluno = NULL, id_veiculo = NULL WHERE id_veiculo = $id_carro"); 

        $result= mysqli_query($conect,"DELETE FROM carro WHERE id = $id_carro"); 
        $result= mysqli_query($conect,"DELETE FROM aluno WHERE id = $id_aluno"); 

    }
    
}

function excluir_carro($id_carro) {
    $conect = conexao();

    $query_excluir_carro = "DELETE FROM carro WHERE id = $id_carro";
    $resultado_excluir_carro = mysqli_query($conect, $query_excluir_carro);

    if ($resultado_excluir_carro) {
        return "Carro excluído com sucesso!";
        header("Location: index.php");
    } else {
        return "Erro ao excluir carro: " . mysqli_error($conect);
    }
}
?>
