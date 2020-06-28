function initLoginCadastro() {
  const login = document.querySelector('[data-form ="login"]');
  const cadastro = document.querySelector('[data-form ="cadastro"]');
  
  const btnCadastro = document.querySelector('[data-form ="login"] .botoes a');
  const btnLogin = document.querySelector('[data-form ="cadastro"] .botoes a');
  
  login.classList.add('form-ativo'); 
  
  function ativaLogin(event) {
    event.preventDefault();
    cadastro.classList.remove('form-ativo'); 
    login.classList.add('form-ativo');
  }
  
  function ativaCadastro(event) {
    event.preventDefault();
    login.classList.remove('form-ativo');
    cadastro.classList.add('form-ativo'); 
  }
  
  
  btnCadastro.addEventListener('click', ativaCadastro);
  btnLogin.addEventListener('click', ativaLogin);
}

initLoginCadastro();




function acionaErro() {
  const locationIndex = window.location.href.split('?');

  if (locationIndex.length > 1) {
    const tipoErro = locationIndex[1].split('=')[1];
    
    if (tipoErro == "cadastro") {
      const login = document.querySelector('[data-form ="login"]');
      const cadastro = document.querySelector('[data-form ="cadastro"]');
      
      login.classList.remove('form-ativo');
      cadastro.classList.add('form-ativo'); 
    }
  }
}

acionaErro();