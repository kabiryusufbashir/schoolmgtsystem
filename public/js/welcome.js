let loginBtnSection = document.querySelector('#loginBtnSection')
let staffLoginBtn = document.querySelector('#staffLoginBtn')
let staffLoginSection = document.querySelector('#staffLoginSection')
let studentLoginBtn = document.querySelector('#studentLoginBtn')
let studentLoginSection = document.querySelector('#studentLoginSection')

staffLoginBtn.addEventListener('click', ()=>{
    if(staffLoginSection.classList.contains('hidden')){
        staffLoginSection.classList.remove('hidden');
        loginBtnSection.classList.add('hidden');
    }else{
        loginBtnSection.classList.remove('hidden');
        staffLoginSection.classList.add('hidden');
    }
})

studentLoginBtn.addEventListener('click', ()=>{
    if(studentLoginSection.classList.contains('hidden')){
        studentLoginSection.classList.remove('hidden');
        loginBtnSection.classList.add('hidden');
    }else{
        loginBtnSection.classList.remove('hidden');
        studentLoginSection.classList.add('hidden');
    }
})

