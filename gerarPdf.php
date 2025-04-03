<?php 
use Dompdf\Dompdf;

require_once('dompdf/autoload.inc.php');
include('config.php');

$dompdf = new Dompdf();

//<h3 class='cabecalho'>IGREJA EVANGELICA ASSEMBLEIA DE DEUS <span>".date('F Y')."</span></h3>
// Array completo com todos os meses
$meses = [
    '1' => 'Jan', '2' => 'Fev', '3' => 'Mar', '4' => 'Abr',
    '5' => 'Mai', '6' => 'Jun', '7' => 'Jul', '8' => 'Ago',
    '9' => 'Set', '10' => 'Out', '11' => 'Nov', '12' => 'Dez'
];

$sqlPdf = "SELECT * FROM regionais ORDER BY CAST(mes AS UNSIGNED), CONVERT(regional, UNSIGNED)";
$result = $conexao->query($sqlPdf);

// CSS ORIGINAL (mantido conforme sua preferência)
$html = "
<head>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
  <style>
    * {
      font-family: sans-serif;
    }
    h1, h2, h3, h4 {
      font-family: sans-serif;
      margin: 5px;
    }
    table {
      font-family: sans-serif;
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 4px;
      font-size: 12px;
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
      font-size: 10px;
    }
    .bold-text {
      font-weight: bold;
    }
    .text-center {
      text-align: center;
    }
    .table>:not(caption)>*>* {
      padding: 0.3rem;
    }
    .cabecalho span {
      margin: 0px 0px 0px 87%;
    }
  </style>
</head>
<body>
  
  <h3 class='cabecalho'>IGREJA EVANGELICA ASSEMBLEIA DE DEUS <span>TRIMESTRE</span></h3>
  <h4>CAMPO 1. PR. RAUL CAVALCANTE BATISTA</h4>
  
  <table class='table table-striped'>
    <thead>
      <tr class='text-center'>
        <th scope='col'>REGIONAIS</th>
        <th scope='col'>CULTOS</th>
        <th scope='col'>DECISÕES</th>
        <th scope='col'>RECONCILIAÇÕES</th>
        <th scope='col'>BATISMO NO ESPIRITO SANTO</th>
        <th scope='col'>CURAS</th>
        <th scope='col'>LIBERTAÇÃO</th>
        <th scope='col'><span>VISITA</span>/<span>LOUVOR</span>/<span>TESTEMUNHOS</span></th>
        <th scope='col'>VISITA NOS HOSPITAIS</th>
        <th scope='col'>MULHERES DA BIBLIA</th>
        <th scope='col'>TRABALHOS EVANGELÍSTICOS</th>
        <th scope='col'>OFERTAS R$</th>
        <th scope='col'>MÊS</th>
      </tr>
    </thead>
    <tbody>";

while($dados = $result->fetch_assoc()) {
    $mes_nome = $meses[$dados['mes']] ?? 'Inv'; // Usa o array de meses
    
    $html .= "<tr class='text-center'>";
    $html .= "<td>".htmlspecialchars($dados['regional'])."</td>";
    $html .= "<td>".htmlspecialchars($dados['cultos'])."</td>";
    $html .= "<td>".htmlspecialchars($dados['decisoes'])."</td>";
    $html .= "<td>".htmlspecialchars($dados['reconciliacoes'])."</td>";
    $html .= "<td>".htmlspecialchars($dados['batismo_com_espirito_santo'])."</td>";
    $html .= "<td>".htmlspecialchars($dados['curas'])."</td>";
    $html .= "<td>".htmlspecialchars($dados['libertacao'])."</td>";
    $html .= "<td>".htmlspecialchars($dados['visita_louvor_testemunho'])."</td>";
    $html .= "<td>".htmlspecialchars($dados['visita_hospitais'])."</td>";
    $html .= "<td>".htmlspecialchars($dados['mulheres_biblia'])."</td>";
    $html .= "<td>".htmlspecialchars($dados['trabalho_evangelistico'])."</td>";
    $html .= "<td>".number_format($dados['oferta'], 2, ',', '.')."</td>";
    $html .= "<td>".$mes_nome."</td>";
    $html .= "</tr>";
}

// Cálculo dos totais (mantido igual)
$sqlTotal = "SELECT 
  SUM(cultos) AS total_cultos, 
  SUM(decisoes) AS total_decisoes, 
  SUM(reconciliacoes) AS total_reconciliacoes, 
  SUM(batismo_com_espirito_santo) AS total_bces, 
  SUM(curas) AS total_curas, 
  SUM(libertacao) AS total_libertacao, 
  SUM(visita_louvor_testemunho) AS total_vlt, 
  SUM(visita_hospitais) AS total_vnh, 
  SUM(mulheres_biblia) AS total_mdb, 
  SUM(trabalho_evangelistico) AS total_te, 
  SUM(oferta) AS total_ofertas 
FROM regionais";

$resultTotal = $conexao->query($sqlTotal);

if ($resultTotal) {
    $fetch = $resultTotal->fetch_assoc();
    
    $html .= "<tr class='text-center'>";
    $html .= "<td class='bold-text'>TOTAL</td>";
    $html .= "<td class='bold-text'>".$fetch['total_cultos']."</td>";
    $html .= "<td class='bold-text'>".$fetch['total_decisoes']."</td>";
    $html .= "<td class='bold-text'>".$fetch['total_reconciliacoes']."</td>";
    $html .= "<td class='bold-text'>".$fetch['total_bces']."</td>";
    $html .= "<td class='bold-text'>".$fetch['total_curas']."</td>";
    $html .= "<td class='bold-text'>".$fetch['total_libertacao']."</td>";
    $html .= "<td class='bold-text'>".$fetch['total_vlt']."</td>";
    $html .= "<td class='bold-text'>".$fetch['total_vnh']."</td>";
    $html .= "<td class='bold-text'>".$fetch['total_mdb']."</td>";
    $html .= "<td class='bold-text'>".$fetch['total_te']."</td>";
    $html .= "<td class='bold-text'>".number_format($fetch['total_ofertas'], 2, ',', '.')."</td>";
    $html .= "<td></td>";
    $html .= "</tr>";
} 

$html .= "</tbody></table>
<h3>Oferta total: R$".number_format($fetch['total_ofertas'], 2, ',', '.')."</h3>
</body>";

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('relatorio.pdf', array("Attachment" => false));
?>