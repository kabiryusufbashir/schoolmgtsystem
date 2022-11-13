// System Name 
let systemNameLink = document.querySelector('#systemNameLink')
let systemName = document.querySelector('#systemName')
let closeModalSystemName = document.querySelector('#closeModalSystemName')

systemNameLink.addEventListener('click', ()=>{
    if(systemName.classList.contains('hidden')){
        systemName.classList.remove('hidden');
    }else{
        systemName.classList.add('hidden');
    }
})

closeModalSystemName.addEventListener('click', ()=>{
    if(systemName.classList.contains('hidden')){
        systemName.classList.remove('hidden');
    }else{
        systemName.classList.add('hidden');
    }
})

