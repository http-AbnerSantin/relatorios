<?php 

    include_once('config.php');

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    $table = 'regionais';

    $sqlTruncate = "TRUNCATE TABLE $table";

    if ($conexao->query($sqlTruncate) === TRUE) {

        // Usar JavaScript para forçar redirecionamento na mesma aba
        // echo "<script>window.location.href = 'index.php';</script>";
         // Interrompe a execução do script
    } else {
        echo "Erro ao limpar a tabela: " . $conexao->error;
    }
    
    // Fecha a conexão
    $conexao->close();

?>
