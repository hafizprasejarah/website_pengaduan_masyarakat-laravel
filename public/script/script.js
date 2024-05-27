const menu = document.querySelector(".container.login");
let btnregister = null;
let btnlogin = null;


if (menu) {

    // btn login
    const login = document.querySelector('.container.login');
    document.querySelector("#btn-login").onclick = () => {
        register.classList.remove('active');
        login.classList.toggle('active');

    }

    const login2 = document.querySelector('.container.login');
    document.querySelector("#btn-login2").onclick = () => {
        register.classList.remove('active');
        login2.classList.toggle('active');

    }

    // btn register
    const register = document.querySelector('.container.registrasi');
    document.querySelector("#btn-register").onclick = () => {
        register.classList.toggle('active');
        login.classList.remove('active');


    }

    btnregister = register;
    btnlogin = login;
}

//sidebar menu
const sidebar = document.querySelector('.user-menu');
if (sidebar) {
    const sidebarmenu = document.querySelector('.sidebar');
    document.querySelector('.user-menu').onclick = () => {
        sidebarmenu.classList.toggle('active');

    }
}

// header scroll behavior
// let scrolly = 0;
// const header = document.querySelector('.header');

// window.onscroll = () => {


//     if (scrolly > window.scrollY) {
//         header.classList.remove('active');
//     } else {
//         header.classList.add('active');
//     }

//     const dragStart = () => {
//         scrolly = window.scrollY;
//     }
//     window.addEventListener('scroll', dragStart);

// }

//dropdown 
const menu_dropdown = document.querySelector('.container.dropdown');

if (menu_dropdown) {
    const dropdown = document.querySelector('.container.dropdown');
    document.querySelector("#profile").onclick = () => {
        dropdown.classList.toggle('active');


    }
}



