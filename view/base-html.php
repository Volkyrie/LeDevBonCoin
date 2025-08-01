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
            <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        
        <div id="write-ad" class="color-white font-20 gap15 display-flex">
            <i class="fa-solid fa-pen-to-square"></i>
            <a href="/ledevboncoin/postad" class="jersey-10-regular">Poster une annonce</a>
        </div>
        <div id="connection" class="color-white font-20 gap15 display-flex">
            <a href="/ledevboncoin/login" class="jersey-10-regular"><?= $username ?? 'Connexion/Inscription' ?></a>
            <i class="fa-solid fa-user"></i>
        </div>
    </header>
    <main class="display-flex align-center flex-column">
        <nav>

        </nav>
        <?php if(isset($_SESSION['error'])) : ?>
            <div class="error"><?= $_SESSION['error']?></div>
            <?php unset($_SESSION['error'])?>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['success'])) : ?>
            <div class="success"><?= $_SESSION['success']?></div>
            <?php unset($_SESSION['success'])?>
        <?php endif; ?>
        
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
</body>
</html>