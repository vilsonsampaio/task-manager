function initCriarAvatar() {
  const nomeCompleto = document.querySelector('#dashboard header .perfil .nome h1').innerText;
  const nomeSeparado = nomeCompleto.split(' ');
  let nomeAbreviado;

  if (nomeSeparado[1]) {
    nomeAbreviado = nomeSeparado[0][0] + nomeSeparado[1][0];    
    document.querySelector('#dashboard header .perfil .nome h1').innerText = nomeSeparado[0] + ' ' + nomeSeparado[1];  
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

function initFormatarData() {
  const datas = document.querySelectorAll('.card .data span');
  
  datas.forEach(data => {
    data.parentElement.firstElementChild.style = 'font-size: 16px;'
    const dia = data.innerText.split('-')[2];
    const mes = data.innerText.split('-')[1];
    const anoRaw = data.innerText.split('-')[0];
    const ano = anoRaw[2]+anoRaw[3];
    data.innerText = `${dia}.${mes}.${ano}`
  });  
}

initFormatarData();



function initFormatarHora() {
  const horas = document.querySelectorAll('.card .hora span');
  
  horas.forEach(hora => {
    if (hora.innerText === '00:00:00') {
      hora.parentElement.style= 'display: none;';
    } else {
      const hour = hora.innerText.split(':')[0];
      const minuto = hora.innerText.split(':')[1];
      hora.innerText = `${hour}:${minuto}`
    }
  });  
}

initFormatarHora();



function initEsconderDescricao() {
  const descricoes = document.querySelectorAll('.card dd p');

  for (let i = 0; i < descricoes.length; i++) {
    if (descricoes[i].innerText == '') {
      descricoes[i].parentElement.style= 'display: none;';
      descricoes[i].parentElement.parentElement.firstElementChild.lastElementChild.style= 'display: none;'      
    }
  }
}

initEsconderDescricao();



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

// function acionarExcluirTarefa() {
//   const excluirTarefas = document.querySelectorAll('#dashboard main .card .excluir');
  
//   function confirmarExclusão(event) {
//     event.preventDefault();
//     var r = confirm("Confirma a exclusão?");
//     if (r == true) {
//       this.setAttribute('href', 'oie')
//       console.log("você pressionou OK!");
//     }
//   }
  
//   excluirTarefas.forEach(excluirTarefa => {
//     excluirTarefa.addEventListener('click', confirmarExclusão);
//   }); 
// }

// acionarExcluirTarefa();



