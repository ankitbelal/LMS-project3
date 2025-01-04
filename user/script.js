const warpper = document.querySelector('.wrapper');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');
const btnlogin = document.querySelector('.btnlogin');
const iconclose = document.querySelector('.icon-close');



registerlink.addEventListener('click', () => {
    warpper.classList.add('active');
    
});

loginlink.addEventListener('click', () => {
    warpper.classList.remove('active');
   
});

btnlogin.addEventListener('click', () => {  
    warpper.classList.add('activepop');
   
});

iconclose.addEventListener('click', () => {
    warpper.classList.remove('activepop');
   
});