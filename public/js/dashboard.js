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

// System Email 
let systemEmailLink = document.querySelector('#systemEmailLink')
let systemEmail = document.querySelector('#systemEmail')
let closeModalSystemEmail = document.querySelector('#closeModalSystemEmail')

systemEmailLink.addEventListener('click', ()=>{
    if(systemEmail.classList.contains('hidden')){
        systemEmail.classList.remove('hidden');
    }else{
        systemEmail.classList.add('hidden');
    }
})

closeModalSystemEmail.addEventListener('click', ()=>{
    if(systemEmail.classList.contains('hidden')){
        systemEmail.classList.remove('hidden');
    }else{
        systemEmail.classList.add('hidden');
    }
})

