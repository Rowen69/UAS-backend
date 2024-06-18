let menu = document.querySelector('#menu-icon');
let navlist = document.querySelector('.navlist');

menu.onclixk = () => {
    menu.classList.toggle('bx-x');
    navlist.classList.toggle('open');
}

window.onscroll = () => {
    menu.classList.remove('bx-x');
    navlist.classList.remove('open');
}