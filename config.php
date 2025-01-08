<?php

  $dbHost = 'localhost';
  $user = 'root';
  $pss = '';
  $dbName = 'relatorios_regionais';

  $conexao = new mysqli($dbHost, $user, $pss, $dbName);

  // if($conexao->connect_errno) {
  //   echo 'erro de conexão';
  // } else {
  //   echo 'conexão efetuada com sucesso';
  // }
?>