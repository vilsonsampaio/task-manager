function initCadastroLogin() {
  const botoes = document.querySelectorAll('#login form button.btn-ghost');
  const forms = document.querySelectorAll('#login .form form');

  forms[1].classList.add('hidden')

  function adicionaHiddenCadastro() {
    forms[1].classList.add('hidden');
    forms[0].classList.remove('hidden');
  }

  function adicionaHiddenLogin() {
    forms[0].classList.add('hidden');
    forms[1].classList.remove('hidden');
  }

  botoes[1].addEventListener('click', adicionaHiddenCadastro);
  botoes[0].addEventListener('click', adicionaHiddenLogin);  
  
}

initCadastroLogin();