<?php

$title = "Page d'accueil";
ob_start();
?>

<h1 class="jersey-10-regular color-grey">Se connecter</h1>
<form action="/ledevboncoin/login" method="POST" class="display-flex flex-column gap40 align-center color-grey">
    <div class="display-flex flex-column gap15 width100">
        <label for="email" class="arial">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div class="display-flex flex-column gap15 width100">
        <label for="password" class="arial">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>
    <button type="submit" class="jersey-10-regular color-white">Se connecter</button>
</form>
<?php
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';