<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ledevboncoin/style/style.css">
    <script src="https://kit.fontawesome.com/4f3e1a72fd.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">

    <title><?= $title ?></title>
</head>
<body>
    <header class="display-flex justify-center gap60 align-center">
        <a href="/ledevboncoin" class="jersey-10-regular logo">LDBC</a>
        <div id="search-bar" class="display-flex align-center">
            <input type="text" id="search" class="jersey-10-regular search-bar color-grey" placeholder="Entrez votre recherche">
            <button id="search-btn" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        
        <div id="write-ad" class="color-white font-20 gap15 display-flex align-center">
            <a href="/ledevboncoin/postad" class="jersey-10-regular display-flex"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="/ledevboncoin/postad" class="jersey-10-regular">Poster une annonce</a>
        </div>
        <div id="connection" class="color-white font-20 gap15 display-flex">
            <?php if(isset($_SESSION['id'])) { ?>
                <div class="dropdown">
                    <button id="dropdown-btn" class="jersey-10-regular color-white"> Bonjour, <?= $_SESSION['name'] ?> <i class="fa-solid fa-user"></i></button>
                    <div id="dropdown-menu" class="dropdown-menu flex-column jersey-10-regular">
                        <a href="/ledevboncoin/userad" class="color-grey">Mes annonces</a>
                        <a href="/ledevboncoin/logout" class="color-red"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion</a>
                    </div>
                </div>
                
            <?php    
            } else { ?>
                    <a href="/ledevboncoin/login" class="jersey-10-regular"><?= 'Connexion/Inscription' ?></a>
            <?php    
                }
            ?>
        </div>
    </header>
    <main class="display-flex align-center flex-column">
        <?php if(isset($_SESSION['error'])) : ?>
            <div class="error width100"><?= $_SESSION['error']?></div>
            <?php unset($_SESSION['error'])?>
        <?php endif; ?>
        <?php if(isset($_SESSION['success'])) : ?>
            <div class="success width100"><?= $_SESSION['success']?></div>
            <?php unset($_SESSION['success'])?>
        <?php endif; ?>
        <nav class="width100">
            <ul class="display-flex gap60 width100 justify-center">
                <li><a href="#" class="category color-grey" id="Tout">Tout</a></li>
                <?php
                    foreach($categories as $category) :
                ?>
                    <li><a href="#" id="<?= $category['name'] ?>" class="category color-grey"><?= $category['name'] ?></a></li>
                <?php
                    endforeach;
                ?>
            </ul>
        </nav>
        
        <?= $content ?? 'Pas de contenu' ?>
    </main>
    <footer class="display-flex justify-center gap60 align-center arial">
        <a href="/ledevboncoin" class="jersey-10-regular logo">LDBC</a>
        <div class="display-flex gap60">
            <a href="#">Mentions légales</a>
            <a href="#">Contacts</a>
        </div>
        <p class="color-white">© 2025. All rights reserved.</p>
    </footer>
    <script src="/ledevboncoin/js/main.js"></script>
</body>
</html>