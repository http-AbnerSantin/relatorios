<?php
  include_once('config.php');

  if (isset($_POST['update'])) {
    // Captura os dados do formulário

    
    $id = $_POST['id'];
    $regional = $_POST['regional'];
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
    $mes = $_POST['mes'];

    // Realiza a atualização no banco de dados
    $sqlUpdate = "UPDATE regionais SET  
      regional = '$regional',
      cultos = '$cultos',
      decisoes = '$decisoes',
      reconciliacoes = '$reconciliacoes',
      batismo_com_espirito_santo = '$batismo_com_espirito_santo',
      curas = '$curas',
      libertacao = '$libertacao',
      visita_louvor_testemunho = '$visita_louvor_testemunho',
      visita_hospitais = '$visita_hospitais',
      mulheres_biblia = '$mulheres_biblia',
      trabalho_evangelistico = '$trabalho_evangelistico',
      oferta = '$oferta',
      mes = '$mes'
      WHERE id = '$id'";

    $result = $conexao->query($sqlUpdate);

    // Caso a atualização seja bem-sucedida, redireciona
    if ($result) {
        header('Location: index.php'); // Redireciona para a página principal após atualização
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
  } else {
    echo "Erro: Dados não foram recebidos.";
  }
?>
