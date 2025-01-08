<?php 
  use Dompdf\Dompdf;

  require_once('dompdf/autoload.inc.php');
  include('config.php');

  $dompdf = new Dompdf();

  $sqlPdf = "SELECT * FROM regionais ORDER BY regional";
  $result = $conexao->query($sqlPdf);


  $html = "";
  $html .= "

<head>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
  <link rel='stylesheet' href='style.css'>
</head>
<style>
h1,
h2,
h3 {
  font-family: sans-serif;
}
table {
  font-family: sans-serif;
  width: 100%;
  border-collapse: collapse;
}
th,
td {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 12px;
}
th{
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
</style>
<body>
  <h1>IGREJA EVANGELICA ASSEMBLEIA DE DEUS</h1>
  <h2>CAMPO 1. PR. RAUL CAVALCANTE BATISTA</h2>
  
  <table class='table table-striped'>
    <thead>
      <tr class='text-center'>
        <th scope='col' >REGIONAIS</th>
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
        <th scope='col'>OFERTAS</th>
      </tr>
    </thead>
    <tbody>";

    while($dados = mysqli_fetch_assoc($result)) {
      $html .= "<tr class='text-center'>";
      $html .= "<td>" . $dados['regional'] . "</td>";
      $html .= "<td>" . $dados['cultos'] . "</td>";
      $html .= "<td>" . $dados['decisoes'] . "</td>";
      $html .= "<td>" . $dados['reconciliacoes'] . "</td>";
      $html .= "<td>" . $dados['batismo_com_espirito_santo'] . "</td>";
      $html .= "<td>" . $dados['curas'] . "</td>";
      $html .= "<td>" . $dados['libertacao'] . "</td>";
      $html .= "<td>" . $dados['visita_louvor_testemunho'] . "</td>";
      $html .= "<td>" . $dados['visita_hospitais'] . "</td>";
      $html .= "<td>" . $dados['mulheres_biblia'] . "</td>";
      $html .= "<td>" . $dados['trabalho_evangelistico'] . "</td>";
      $html .= "<td>R$" . number_format($dados['oferta'], 2, ',','. ') . "</td>";
      $html .= "</tr>";

    }
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
            $html .= "<td class='bold-text'>" . $fetch['total_cultos'] . "</td>";
            $html .= "<td class='bold-text'>" . $fetch['total_decisoes'] . "</td>";
            $html .= "<td class='bold-text'>" . $fetch['total_reconciliacoes'] . "</td>";
            $html .= "<td class='bold-text'>" . $fetch['total_bces'] . "</td>";
            $html .= "<td class='bold-text'>" . $fetch['total_curas'] . "</td>";
            $html .= "<td class='bold-text'>" . $fetch['total_libertacao'] . "</td>";
            $html .= "<td class='bold-text'>" . $fetch['total_vlt'] . "</td>";
            $html .= "<td class='bold-text'>" . $fetch['total_vnh'] . "</td>";
            $html .= "<td class='bold-text'>" . $fetch['total_mdb'] . "</td>";
            $html .= "<td class='bold-text'>" . $fetch['total_te'] . "</td>";
            $html .= "<td class='bold-text'>R$" .  number_format($fetch['total_ofertas'], 2, ',','. ') . "</td>";
            $html .= "</tr>";
        } 
    $html .= "</tbody>";
  
  $html .="</table></body>";

    // echo $html;

  $dompdf->loadHtml($html);
  
  $dompdf->setPaper('A4', 'landscape');

  $dompdf->render();

  $dompdf->stream('relatorio.pdf', array("Attachment" => false));

?>