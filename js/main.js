const menuBtn = document.getElementById('dropdown-btn');
const menuDropdown = document.getElementById('dropdown-menu');

let showMenu = () => {
    if(!menuDropdown.classList.contains('showMenu')) {
        menuDropdown.classList.toggle('showMenu');
    } else {
        menuDropdown.classList.toggle('hideMenu');
    }
}

menuBtn.addEventListener('click', showMenu);