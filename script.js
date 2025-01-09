//limpar o formulario preenchido

function clearForm() {
  document.getElementById('contactForm').reset(); // Limpa todos os campos do formulário

}



document.getElementById('truncate-btn').addEventListener('click', function () {
  if (confirm('Tem certeza de que deseja limpar a tabela?')) {
      fetch('truncate.php', {
          method: 'POST',
      })
      .then(response => response.text())
      .then(data => {
          // alert(data); // Mostra a mensagem retornada pelo servidor
          location.reload(); // Atualiza a página
      })
      .catch(error => console.error('Erro:', error));
  }
});