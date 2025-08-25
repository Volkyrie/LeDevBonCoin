//CATEGORY MENU
let categories = Array.from(document.getElementsByClassName('category'));

let filterAds = () => {
    let categoryName = sessionStorage.getItem("category");

    if(window.location.href !== 'http://localhost/ledevboncoin/') {
        location.replace('http://localhost/ledevboncoin/');
    }
    
    let items = Array.from(document.getElementsByClassName('card'));
    let msg = document.getElementById('msg');
    
    items.forEach(item => {
        item.style.display = 'flex';
        msg.classList.remove('display-flex');
        msg.classList.add('hidden');
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

    localStorage.removeItem("category");
    localStorage.removeItem("searchValue");
}

categories.forEach(category => {
    category.addEventListener('click', function(e) {
        e.preventDefault();
        sessionStorage.setItem("category", category.id);
        filterAds();
    });
});

window.addEventListener("load", function () {
  if(sessionStorage.getItem("category") && (window.location.href === 'http://localhost/ledevboncoin/')) {
    filterAds();
    sessionStorage.removeItem("category");
    sessionStorage.removeItem("searchValue");
  }
});

//SEARCH BAR
let searchBar = document.getElementById('search');
let searchBtn = document.getElementById('search-btn');
const smallScreen = window.screen.width;

let filterContent = (searchValue) => {
    let items = Array.from(document.getElementsByClassName('card'));
    let msg = document.getElementById('msg');
    
    items.forEach(item => {
        let cardInfo = item.innerHTML;
        item.style.display = 'flex';
        msg.classList.remove('display-flex');
        msg.classList.add('hidden');
        console.log(searchValue);
        if(cardInfo.match(searchValue)) {
            item.style.display = 'flex';
        } else {
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
    localStorage.removeItem("searchValue");
    localStorage.removeItem("category");
}

if (smallScreen <= 600) {
    searchBar.placeholder = "";
    searchBtn.addEventListener('click', function(e) {
        e.preventDefault();
        searchBar.focus();
        searchBar.addEventListener('keydown', function(e) {
            console.log("on est là");
            if(e.key === "Enter") {
                let searchValue = searchBar.value;
                sessionStorage.setItem("searchValue", searchValue);
                location.replace('http://localhost/ledevboncoin/');
            }
        })
    })
} else {
    searchBtn.addEventListener('click', function(e) {
        e.preventDefault();
        let searchValue = searchBar.value;
        sessionStorage.setItem("searchValue", searchValue);
        location.replace('http://localhost/ledevboncoin/');
    });
}

searchBar.addEventListener('keyup', function(e) {
        e.preventDefault();
        let searchValue = searchBar.value;
        filterContent(searchValue);
});

window.addEventListener("load", function () {
  if(sessionStorage.getItem("searchValue") && (window.location.href === 'http://localhost/ledevboncoin/')) {
    filterContent(sessionStorage.getItem("searchValue"));
    sessionStorage.removeItem("searchValue");
  }
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

//DELETE CONFIRMATION
if(window.location.href === 'http://localhost/ledevboncoin/userad') {
    let deleteBtns = Array.from(document.getElementsByClassName('delete-ad'));
    let cancelBtn = document.getElementById('cancel');
    let popup = document.getElementById('popup');

    let popupConfirm = (id) => {
        let deleteAction = document.getElementById('delete');
        popup.style.display = "flex";
        sessionStorage.setItem("deleteAd", id);
        deleteAction.addEventListener('click', function(e) {
            location.replace(`/ledevboncoin/deletead/${id}`);
        });
    }

    deleteBtns.forEach(ad => {
        ad.addEventListener('click', function(e) {
            e.preventDefault();
            popupConfirm(ad.value)});
    })

    let closePopup = () => {
        popup.style.display = "none";
        sessionStorage.removeItem("deleteAd");
    }

    cancelBtn.addEventListener('click', closePopup);
}
