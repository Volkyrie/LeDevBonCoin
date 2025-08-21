//CATEGORY MENU
let categories = Array.from(document.getElementsByClassName('category'));

let filterAds = (category) => {
    let categoryName = category.id;
    let items = Array.from(document.getElementsByClassName('card'));
    let msg = document.getElementById('msg');
    
    items.forEach(item => {
        item.style.display = 'flex';
        msg.classList.remove('display-flex');
        msg.classList.add('hidden');
        console.log(categoryName);
        if(categoryName === 'Tout') {
            item.style.display = 'flex';
        } else if(!(item.getAttribute('data-category') === categoryName)) {
            item.style.display = 'none';
        }
    });

    items = [...document.getElementsByClassName('card')];
    let counter = 0;

    items.forEach(card => {
        if(!(window.getComputedStyle(card).display === "none")) {
            counter++;
        }
    });

    if(counter === 0) {
        msg.classList.remove('hidden');
        msg.classList.add('display-flex');
    }
}

categories.forEach(category => {
    category.addEventListener('click', function(e) {
        e.preventDefault();
        filterAds(category);
    });
});


//DROPDOWN MENU
try {
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
} catch(e) {
    console.log("User not connected");
}
