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
    $mes = $_POST['mes'];
    $oferta = $_POST['oferta']; // Exemplo: "12,34" (string com vírgula)

    // Substitui vírgula por ponto e converte para float
    $oferta_float = str_replace(',', '.', $oferta);
    $oferta_float = (float)$oferta_float; // Garante que seja um número
    $oferta_format = number_format($oferta_float, 2, '.', ',');

    // Inserindo dados no banco
    $result = mysqli_query($conexao, "INSERT INTO regionais (regional, cultos, decisoes, reconciliacoes, batismo_com_espirito_santo, curas, libertacao, visita_louvor_testemunho, visita_hospitais, mulheres_biblia, trabalho_evangelistico, oferta, mes) 
                                      VALUES ('$regional', '$cultos', '$decisoes', '$reconciliacoes', '$batismo_com_espirito_santo', '$curas', '$libertacao', '$visita_louvor_testemunho', '$visita_hospitais', '$mulheres_biblia', '$trabalho_evangelistico', '$oferta_format', '$mes')");

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
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="decisoes" class="block text-sm font-medium text-gray-600">DECISÕES</label>
                        <input type="text" id="decisoes" name="decisoes" placeholder="Numero de Decisões"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="reconciliacoes" class="block text-sm font-medium text-gray-600">RECONCILIAÇÕES </label>
                        <input type="text" id="reconciliacoes" name="reconciliacoes" placeholder="Numero de Reconciliações"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="batismo_com_espirito_santo" class="block text-sm font-medium text-gray-600">BATISMO COM ESPIRITO SANTO </label>
                        <input type="text" id="batismo_com_espirito_santo" name="batismo_com_espirito_santo" placeholder="Numero de batismos"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="curas" class="block text-sm font-medium text-gray-600">CURAS </label>
                        <input type="text" id="curas" name="curas" placeholder="Numero de Curas"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="libertacao" class="block text-sm font-medium text-gray-600">LIBERAÇÃO </label>
                        <input type="text" id="libertacao" name="libertacao" placeholder="Numero de libertações"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="visita_louvor_testemunho" class="block text-sm font-medium text-gray-600">VISITA/LOUVOR/TESTEMUNHO </label>
                        <input type="text" id="visita_louvor_testemunho" name="visita_louvor_testemunho" placeholder="Total dos três"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="visita_hospitais" class="block text-sm font-medium text-gray-600">VISITA NOS HOSPITAIS </label>
                        <input type="text" id="visita_hospitais" name="visita_hospitais" placeholder="Numero de visitas"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="mulheres_biblia" class="block text-sm font-medium text-gray-600">MULHERES DA BÍBLIA</label>
                        <input type="text" id="mulheres_biblia" name="mulheres_biblia" placeholder="Numero de mulheres"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="trabalho_evangelistico" class="block text-sm font-medium text-gray-600">TRABALHOS EVANGELÍSTICOS</label>
                        <input type="text" id="trabalho_evangelistico" name="trabalho_evangelistico" placeholder="Numero de trabalhos"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="oferta" class="block text-sm font-medium text-gray-600">OFERTA</label>
                        <input type="text" id="oferta" name="oferta" placeholder="R$"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="mes" class="block text-sm font-medium text-gray-600">MES</label>
                        <input type="text" id="mes" name="mes" placeholder=""
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                </div>
                <div class="mb-4 flex flex-col gap-2">
                    <button type="submit" name="submit"
                        class="tracking-wider w-full bg-emerald-600 text-white p-3 rounded-lg hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 shadow-lg">
                        ADICIONAR
                    </button>
                </div>
                <div class="bts">
                    <a style="display: flex; justify-content: left; align-items: center; gap:5px; justify-self: start;" href="gerarPdf.php" class="shadow-lg tracking-wider bg-red-600 text-white p-3 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                            <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z" />
                        </svg>GERAR PDF
                    </a>
                    <button title="Ao clciar nesse botão, as informações digitadas serão limpas" style="display: flex; justify-content: left; align-items: center; gap:5px; justify-self: start;" class="tracking-wider bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-lg" type="button" onclick="document.getElementById('contactForm').reset();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                            <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z" />
                        </svg>LIMPAR CAMPOS
                    </button>

                    <button id="truncate-btn" style="display: flex; justify-content: left; align-items: center; gap:5px; justify-self: start;" class="shadow-lg tracking-wider bg-red-600 text-white p-3 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500" target="_blank" title="Ao clicar nesse botão, todos os dados adicionados na tabela serão excluidos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                        </svg>LIMPAR TABELA</button>



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
                    <th class="px-6 py-3 text-left font-medium text-sm uppercase">MÊS</th>



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
                    echo "<td class='px-6 py-4 text-sm text-gray-700'>" . $row['mes'] . "</td>";




                    echo "</tr>";
                }
                // }
                ?>
            </tbody>
        </table>
    </div>

    <script src="script.js"></script>

</body>

</html>