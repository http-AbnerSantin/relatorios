<?php 
  // Verifica se o formulário foi enviado (somente executa se for uma requisição POST)
  if (!empty($_GET['id'])) { 
    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM regionais WHERE id = $id";

  
    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0) {

      while($listagem = mysqli_fetch_assoc($result)) {
        // Captura os dados do formulário com segurança
        $regional = $listagem['regional'];
        $cultos = $listagem['cultos'];
        $decisoes = $listagem['decisoes'];
        $reconciliacoes = $listagem['reconciliacoes'];
        $batismo_com_espirito_santo = $listagem['batismo_com_espirito_santo'];
        $curas = $listagem['curas'];
        $libertacao = $listagem['libertacao'];
        $visita_louvor_testemunho = $listagem['visita_louvor_testemunho'];
        $visita_hospitais = $listagem['visita_hospitais'];
        $mulheres_biblia = $listagem['mulheres_biblia'];
        $trabalho_evangelistico = $listagem['trabalho_evangelistico'];
        $oferta = $listagem['oferta'];
        $mes = $listagem['mes'];
      }
      

    } else {
      header('Location: index.php');
    };

    
  } else {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Relatórios Regionais</title>
</head>
<body>
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl">
          <a href="index.php" class="nline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out">Voltar</a>
            <h2 class="text-2xl font-semibold text-gray-700 text-center mb-6">EDIÇÃO</h2>
            <form action="saveEdit.php" method="POST" id="contactForm">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Campos do formulário -->
                    <div class="mb-4">
                        <label for="regional" class="block text-sm font-medium text-gray-600">REGIONAL</label>
                        <input type="text" id="regional" name="regional" placeholder="Numero da Regional"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $regional ?>">
                    </div>
                    <div class="mb-4">
                        <label for="cultos" class="block text-sm font-medium text-gray-600">CULTOS</label>
                        <input type="text" id="cultos" name="cultos" placeholder="Quantidade de cultos"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"  value="<?= $cultos ?>">
                    </div>
                    <div class="mb-4">
                        <label for="decisoes" class="block text-sm font-medium text-gray-600">DECISÕES</label>
                        <input type="text" id="decisoes" name="decisoes" placeholder="Numero de Decisões" value="<?= $decisoes?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="reconciliacoes" class="block text-sm font-medium text-gray-600">RECONCILIAÇÕES </label>
                        <input type="text" id="reconciliacoes" name="reconciliacoes" placeholder="Numero de Reconciliações" value="<?= $reconciliacoes?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="batismo_com_espirito_santo" class="block text-sm font-medium text-gray-600">BATISMO COM ESPIRITO SANTO </label>
                        <input type="text" id="batismo_com_espirito_santo" name="batismo_com_espirito_santo" placeholder="Numero de batismos" value="<?= $batismo_com_espirito_santo?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="curas" class="block text-sm font-medium text-gray-600">CURAS </label>
                        <input type="text" id="curas" name="curas" placeholder="Numero de Curas" value="<?= $curas?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="libertacao" class="block text-sm font-medium text-gray-600">LIBERAÇÃO </label>
                        <input type="text" id="libertacao" name="libertacao" placeholder="Numero de libertações" value="<?= $libertacao?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="visita_louvor_testemunho" class="block text-sm font-medium text-gray-600">VISITA/LOUVOR/TESTEMUNHO </label>
                        <input type="text" id="visita_louvor_testemunho" name="visita_louvor_testemunho" placeholder="Total dos três" value="<?= $visita_louvor_testemunho?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="visita_hospitais" class="block text-sm font-medium text-gray-600">VISITA NOS HOSPITAIS </label>
                        <input type="text" id="visita_hospitais" name="visita_hospitais" placeholder="Numero de visitas" value="<?= $visita_hospitais?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="mulheres_biblia" class="block text-sm font-medium text-gray-600">MULHERES DA BÍBLIA</label>
                        <input type="text" id="mulheres_biblia" name="mulheres_biblia" placeholder="Numero de mulheres" value="<?= $mulheres_biblia?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="trabalho_evangelistico" class="block text-sm font-medium text-gray-600">TRABALHOS EVANGELÍSTICOS</label>
                        <input type="text" id="trabalho_evangelistico" name="trabalho_evangelistico" placeholder="Numero de trabalhos" value="<?= $trabalho_evangelistico?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="oferta" class="block text-sm font-medium text-gray-600">OFERTA</label>
                        <input type="text" id="oferta" name="oferta" placeholder="R$" value="<?= $oferta?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="mes" class="block text-sm font-medium text-gray-600">MÊS</label>
                        <input type="text" id="mes" name="mes" placeholder="R$" value="<?= $mes?>"
                            class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                </div>
                <div class="mb-4 flex flex-col gap-2">
                    <!-- <button type="submit" name="update" id="update" value="<?php echo $id?>"
                        class="tracking-wider w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        ATUALIZAR
                    </button> -->
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="submit" name="update" class="tracking-wider w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="update" value="ATUALIZAR" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>
