// Função que pega as duas primeiras iniciais do nome do usuário para criar avatar
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



// Função que troca o filtro das tarefas (pendentes e concluídas)
function initTrocarFiltro() {
  const filtros = document.querySelectorAll('#dashboard main .topo .filtro a');
  const selects = document.querySelectorAll('#dashboard main .cards > div');
  console.log(selects)
  
  filtros[0].classList.add('selecionado');
  selects[0].removeAttribute('style');
  selects[1].style = 'display: none;';
  
  function selecionaPendentes(event) {
    event.preventDefault();

    filtros[1].classList.remove('selecionado');
    filtros[0].classList.add('selecionado');

    selects[0].removeAttribute('style');
    selects[1].style = 'display: none;'; 
  }
  
  function selecionaConcluidas(event) {
    event.preventDefault();

    filtros[0].classList.remove('selecionado');
    filtros[1].classList.add('selecionado');

    selects[0].style = 'display: none;';
    selects[1].removeAttribute('style');
  }
  
  filtros[0].addEventListener('click', selecionaPendentes);
  filtros[1].addEventListener('click', selecionaConcluidas);  
}

if (window.innerWidth > 600)  initTrocarFiltro();


// Função que esconde e mostra a descrição das tarefas, de acordo com o clique na seta
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



// Função que realiza o efeito de check nas tarefas que serão marcadas como tal
function initChecks() {
  const checks = document.querySelectorAll('#dashboard main .cards .card .header .check');
    
  function acionarCheck() { 
    this.parentElement.nextElementSibling.classList.toggle('ativo'); // remove a descrição 
    this.parentElement.lastElementChild.lastElementChild.classList.toggle('ativo'); // removendo a seta pra cima quando der check
    this.parentElement.lastElementChild.firstElementChild.classList.toggle('ativo'); // removendo a seta pra baixa quando der check
    this.parentElement.children[1].classList.toggle('riscado'); // seleciona o h1 e adiciona a classe "riscado"  
    this.parentElement.parentElement.classList.toggle('checked'); // adiciona a classe "checked" em card 
    this.classList.toggle('checked'); // adiciona a classe "checked" pra deixar cinza o bg
    this.firstElement.classList.toggle('checked'); // adiciona a classe "check" para aparece o simbolo check
  }
  
  checks.forEach(check => {
    check.addEventListener('click', acionarCheck);    
  }); 
   
}

initChecks();



// Função que mostra a bolinha de prazo de acordo com a data e hora informada na tarefa
function initAvisoPrazo() {
  const date = new Date();
  const dataHora = date.toLocaleString().split(' ');
  
  const data = dataHora[0].split('/');
  const dia = data[0];
  const mes = data[1];
  const ano = data[2];
  
  const hour = dataHora[1].split(':');
  const hora = hour[0];
  const min = hour[1];
  
  const datasCard = document.querySelectorAll('.pendentes .card .data span');
  let diaCard, mesCard, anoCard, horaCard, minCard;
  
  datasCard.forEach(dataCard => {
    diaCard = dataCard.innerText.split('-')[2];
    mesCard = dataCard.innerText.split('-')[1];
    anoCard = dataCard.innerText.split('-')[0];
  
    horaCard = dataCard.parentElement.nextElementSibling.lastElementChild.innerText.split(':')[0];
    minCard = dataCard.parentElement.nextElementSibling.lastElementChild.innerText.split(':')[1];  
    
  
    if (anoCard < ano) {
      dataCard.parentElement.parentElement.parentElement.parentElement.firstElementChild.classList.add('bolinha');
    } else {
      if (mesCard < mes) {
        dataCard.parentElement.parentElement.parentElement.parentElement.firstElementChild.classList.add('bolinha');
        if (diaCard < dia) {
          dataCard.parentElement.parentElement.parentElement.parentElement.firstElementChild.classList.add('bolinha');        
        }
      } else if (mesCard == mes) {
        if (diaCard < dia) {
          dataCard.parentElement.parentElement.parentElement.parentElement.firstElementChild.classList.add('bolinha');        
        }
      }
    }
  
    if ((anoCard == ano) && (mesCard == mes) && (diaCard == dia)) {
      if (horaCard !== 00) {
        if ((horaCard < hora)) {
          dataCard.parentElement.parentElement.parentElement.parentElement.firstElementChild.classList.add('bolinha');
        }
        if (horaCard > hora) {
          dataCard.parentElement.parentElement.parentElement.parentElement.firstElementChild.classList.add('bolinha', 'bolinha-amarela');
        }
        if ((horaCard == hora) && (minCard<min)) {
          dataCard.parentElement.parentElement.parentElement.parentElement.firstElementChild.classList.add('bolinha', 'bolinha-amarela');
        }    
      }
      
    }
    
  
  }); 
}

initAvisoPrazo();



// Função que formata a data das tarefas (vem como AAAA-MM-DD, e ela transforma para DD.MM.AA)
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



// Função que formata a hora das tarefas (vem como HH:MM:SS, e ela transforma para HH:MM)
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

  descricoes.forEach(descricao => {
    if (!descricao.innerText) {
      descricao.style='display: none;';
      descricao.parentElement.parentElement.children[1].lastElementChild.style='display:none;'; 
    }
  });
}
initEsconderDescricao();