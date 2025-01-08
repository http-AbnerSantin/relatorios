<?php 
  // Verifica se o formulário foi enviado (somente executa se for uma requisição POST)
  if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    include_once('config.php');

    // Captura os dados do formulário com segurança
    $regional = $_POST['regional'] ?? NULL;
    $cultos = $_POST['cultos'];
    $decisoes = $_POST['decisoes'];
    $reconciliacoes = $_POST['reconciliacoes'];
    $batismo_com_espirito_santo = $_POST['batismo_com_espirito_santo'];
    $curas = $_POST['curas'];
    $libertacao = $_POST['libertacao'];
    $visita_louvor_testemunho = $_POST['visita_louvor_testemunho'];
    $visita_hospitais = $_POST['visita_hospitais'];
    $mulheres_biblia = $_POST['mulheres_biblia'];
    $trabalho_evangelistico = $_POST['trabalho_evangelistico'];
    $oferta = $_POST['oferta'];

    // Inserindo dados no banco
    $result = mysqli_query($conexao, "INSERT INTO regionais (regional, cultos, decisoes, reconciliacoes, batismo_com_espirito_santo, curas, libertacao, visita_louvor_testemunho, visita_hospitais, mulheres_biblia, trabalho_evangelistico, oferta) 
                                      VALUES ('$regional', '$cultos', '$decisoes', '$reconciliacoes', '$batismo_com_espirito_santo', '$curas', '$libertacao', '$visita_louvor_testemunho', '$visita_hospitais', '$mulheres_biblia', '$trabalho_evangelistico', '$oferta')");

    // Redireciona para evitar reenvio de dados ao atualizar a página
    header('Location: index.php');
    exit; // Impede a execução do código abaixo após o redirecionamento
  }

  // Buscando dados do banco
  include_once('config.php');
  $sqlListagem = "SELECT * FROM regionais ORDER BY regional ";
  $listagem = $conexao->query($sqlListagem);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Relatórios Regionais</title>
</head>
<body>
    <div class="flex justify-center items-center min-h-screen m-5">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl">
            <h2 class="text-2xl font-semibold text-gray-700 text-center mb-6">RELATÓRIO DAS REGIONAIS DO CAMPO 1</h2>
            <form action="index.php" method="POST" id="contactForm">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Campos do formulário -->
                    <div class="mb-4">
                        <label for="regional" class="block text-sm font-medium text-gray-600">REGIONAL</label>
                        <input type="text" id="regional" name="regional" placeholder="Numero da Regional"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="cultos" class="block text-sm font-medium text-gray-600">CULTOS</label>
                        <input type="text" id="cultos" name="cultos" placeholder="Quantidade de cultos"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="decisoes" class="block text-sm font-medium text-gray-600">DECISÕES</label>
                        <input type="text" id="decisoes" name="decisoes" placeholder="Numero de Decisões"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="reconciliacoes" class="block text-sm font-medium text-gray-600">RECONCILIAÇÕES </label>
                        <input type="text" id="reconciliacoes" name="reconciliacoes" placeholder="Numero de Reconciliações"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="batismo_com_espirito_santo" class="block text-sm font-medium text-gray-600">BATISMO COM ESPIRITO SANTO </label>
                        <input type="text" id="batismo_com_espirito_santo" name="batismo_com_espirito_santo" placeholder="Numero de batismos"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="curas" class="block text-sm font-medium text-gray-600">CURAS </label>
                        <input type="text" id="curas" name="curas" placeholder="Numero de Curas"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="libertacao" class="block text-sm font-medium text-gray-600">LIBERAÇÃO </label>
                        <input type="text" id="libertacao" name="libertacao" placeholder="Numero de libertações"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="visita_louvor_testemunho" class="block text-sm font-medium text-gray-600">VISITA/LOUVOR/TESTEMUNHO </label>
                        <input type="text" id="visita_louvor_testemunho" name="visita_louvor_testemunho" placeholder="Total dos três"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="visita_hospitais" class="block text-sm font-medium text-gray-600">VISITA NOS HOSPITAIS </label>
                        <input type="text" id="visita_hospitais" name="visita_hospitais" placeholder="Numero de visitas"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="mulheres_biblia" class="block text-sm font-medium text-gray-600">MULHERES DA BÍBLIA</label>
                        <input type="text" id="mulheres_biblia" name="mulheres_biblia" placeholder="Numero de mulheres"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="trabalho_evangelistico" class="block text-sm font-medium text-gray-600">TRABALHOS EVANGELÍSTICOS</label>
                        <input type="text" id="trabalho_evangelistico" name="trabalho_evangelistico" placeholder="Numero de trabalhos"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="oferta" class="block text-sm font-medium text-gray-600">OFERTA</label>
                        <input type="text" id="oferta" name="oferta" placeholder="R$"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                </div>
                <div class="mb-4 flex flex-col gap-2">
                    <button type="submit" name="submit"
                        class="tracking-wider w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        ADICIONAR
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabela -->
    <div class="overflow-x-auto">
    <table class="min-w-full table-auto bg-white border-collapse border border-gray-200 shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-100 text-gray-600">
            <th class="px-6 py-3 text-left font-medium text-sm uppercase">...</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">REGIONAL</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">CULTOS</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">DECISÕES</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">RECONCILIAÇÕES</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">BATISMO COM ESPIRITO SANTO</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">CURAS</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">LIBERAÇÃO</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">VISITA/LOUVOR/TESTEMUNHO</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">VISITA NOS HOSPITAIS</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">MULHERES DA BÍBLIA</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">TRABALHOS EVANGELÍSTICOS</th>
                <th class="px-6 py-3 text-left font-medium text-sm uppercase">OFERTA</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php
                // if (isset($listagem) && $listagem->num_rows > 0) {
                    while ($row = $listagem->fetch_assoc()) {
                      echo "<tr class='border-b border-gray-200 hover:bg-gray-50'>";
                      echo "<td class='px-6 py-4 text-sm text-gray-700 botoes'><a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                        </svg></a>
                        <a class='btn btn-danger' href='delete.php?id=$row[id]'>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                          <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                          <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                          </svg>
                        </a>
                        </td>";
                        
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['regional'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['cultos'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['decisoes'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['reconciliacoes'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['batismo_com_espirito_santo'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['curas'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['libertacao'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['visita_louvor_testemunho'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['visita_hospitais'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['mulheres_biblia'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['trabalho_evangelistico'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['oferta'] . "</td>";
                        
                        

                        echo "</tr>";
                    }
                // }
            ?>
        </tbody>
    </table>
    </div>

    <a href="gerarPdf.php">GERAR PDF</a>
</body>
</html>
