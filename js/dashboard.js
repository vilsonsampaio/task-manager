function initCriarAvatar() {
  const nomeCompleto = document.querySelector('#dashboard header .perfil h1').innerText;
  const nomeSeparado = nomeCompleto.split(' ');
  let nomeAbreviado;

  if (nomeSeparado[1]) {
    nomeAbreviado = nomeSeparado[0][0] + nomeSeparado[1][0];  
  } else {
    nomeAbreviado = nomeSeparado[0][0];
  }

  const avatar = document.querySelector('#dashboard header .perfil .avatar');
  avatar.innerHTML = '<h1>'+nomeAbreviado+'</h1>';  
}

initCriarAvatar();



function initTrocarFiltro() {
  const filtros = document.querySelectorAll('#dashboard main .topo .filtro a');
  
  filtros[0].classList.add('selecionado');
  
  function selecionaPendentes(event) {
    event.preventDefault();
    filtros[1].classList.remove('selecionado');
    filtros[0].classList.add('selecionado'); 
  }
  
  function selecionaConcluidas(event) {
    event.preventDefault();
    filtros[0].classList.remove('selecionado');
    filtros[1].classList.add('selecionado'); 
  }
  
  filtros[0].addEventListener('click', selecionaPendentes);
  filtros[1].addEventListener('click', selecionaConcluidas);  
}

initTrocarFiltro();



function initAccordion() {
  const accordionList = document.querySelectorAll('.js-card dt');
  const activeClass = 'ativo';
  if (accordionList.length) {
    accordionList[0].nextElementSibling.classList.add(activeClass);
    accordionList[0].lastElementChild.firstElementChild.classList.remove(activeClass);
    accordionList[0].lastElementChild.lastElementChild.classList.add(activeClass);  
      
    function activeAccordion(event) {
      event.preventDefault();
      console.log(this)
      this.parentElement.nextElementSibling.classList.toggle(activeClass);
      this.parentElement.lastElementChild.lastElementChild.classList.toggle(activeClass);
      this.parentElement.lastElementChild.firstElementChild.classList.toggle(activeClass);  
    }

    for (let i = 0; i < accordionList.length; i++) {
      accordionList[i].lastElementChild.addEventListener('click', activeAccordion);      
    }    
  }
}

initAccordion();



function initCheck() {
  const checks = document.querySelectorAll('#dashboard main .cards .card .header .check');
    
  function acionarCheck(event) { 
    event.preventDefault();
    this.parentElement.nextElementSibling.classList.remove('ativo'); // remove a descrição 
    this.parentElement.lastElementChild.lastElementChild.classList.remove('ativo'); // removendo a seta pra cima quando der check
    this.parentElement.lastElementChild.firstElementChild.classList.add('ativo'); // removendo a seta pra baixa quando der check
    this.parentElement.children[1].classList.toggle('riscado'); // seleciona o h1 e adiciona a classe "riscado"  
    this.parentElement.parentElement.classList.toggle('checked'); // adiciona a classe "checked" em card 
    this.classList.toggle('checked'); // adiciona a classe "checked" pra deixar cinza o bg
    this.firstElement.classList.toggle('checked'); // adiciona a classe "check" para aparece o simbolo check
  }
  
  checks.forEach(check => {
    check.addEventListener('click', acionarCheck);    
  }); 
   
}

initCheck();

const a = document.querySelectorAll('.js-card dt a');




function centralizaForm() {
  const popup = document.querySelector('#pop-up .container');
  const alturaForm = document.querySelector('#pop-up .container').offsetHeight;
  const alturaWindow = window.innerHeight;
  
  let margin = `margin: ${(alturaWindow - alturaForm)/2}px auto;`;
  
  popup.setAttribute('style', margin);  
}

centralizaForm();



function acionarPopUp() {
  const adicionarTarefa = document.querySelector('#dashboard main .hero .adicionar');
  const dashboard = document.querySelector('#dashboard');
  const popup = document.querySelector('#pop-up.adicionar-tarefa');
  const sair = document.querySelector('#pop-up.adicionar-tarefa a'); 
  
  popup.classList.add('hide');

  function abrePopUp(event) {
    event.preventDefault();
    popup.classList.toggle('hide');
    dashboard.classList.toggle('hide');    
  }
    
  adicionarTarefa.addEventListener('click', abrePopUp)
  
  sair.addEventListener('click', abrePopUp)  
}

acionarPopUp();



 function acionarEditarTarefa() {
  const editarTarefas = document.querySelectorAll('#dashboard main .card .editar');
  const dashboard = document.querySelector('#dashboard');
  const popup = document.querySelector('#pop-up.editar-tarefa');
  const sair = document.querySelector('#pop-up.editar-tarefa a'); 
  
  popup.classList.add('hide');

  function abrePopUp(event) {
    event.preventDefault();
    popup.classList.toggle('hide');
    dashboard.classList.toggle('hide');    
  }
  
  
  editarTarefas.forEach(editarTarefa => {
    editarTarefa.addEventListener('click', abrePopUp);
  }); 
  
  sair.addEventListener('click', abrePopUp)  
}

acionarEditarTarefa();

const excluirTarefas = document.querySelectorAll('#dashboard main .card .excluir');

function confirmarExclusão(event) {
  event.preventDefault();
  var r = confirm("Confirma a exclusão?");
  if (r == true) {
    this.setAttribute('href', 'oie')
    console.log("você pressionou OK!");
  }
}

excluirTarefas.forEach(excluirTarefa => {
  excluirTarefa.addEventListener('click', confirmarExclusão);
}); 