<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ledevboncoin/style/style.css">
    <script src="https://kit.fontawesome.com/4f3e1a72fd.js" crossorigin="anonymous"></script>
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <a href="/ledevboncoin">LDBC</a>
        <input type="text" id="search">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
        <div id="write-ad">
            <i class="fa-solid fa-pen-to-square"></i>
            <a href="/ledevboncoin/postad">Poster une annonce</a>
        </div>
        <div id="connection">
            <a href="/ledevboncoin/login">Connexion/Inscription</a>
            <i class="fa-solid fa-user"></i>
        </div>
    </header>
    <main>
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
    <footer>
        <a href="/ledevboncoin">LDBC</a>
        <a href="#">Mentions légales</a>
        <a href="#">Contacts</a>
        <p>© 2025. All rights reserved.</p>
    </footer>
</body>
</html>