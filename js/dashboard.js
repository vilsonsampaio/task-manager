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
  
  function selecionaPendentes() {
    filtros[1].classList.remove('selecionado');
    filtros[0].classList.add('selecionado'); 
  }
  
  function selecionaConcluidas() {
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
  
      
    function activeAccordion() {
      this.nextElementSibling.classList.toggle(activeClass);
      this.lastElementChild.lastElementChild.classList.toggle(activeClass);
      this.lastElementChild.firstElementChild.classList.toggle(activeClass);
  
    }
      
    accordionList.forEach(item => {
      item.addEventListener('click', activeAccordion)
    })
    
  }
}

initAccordion();
