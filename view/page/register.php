<?php

$title = "Page d'accueil";
ob_start();
?>

<h1 class="jersey-10-regular color-grey">S'enregistrer</h1>
<form action="/ledevboncoin/register" method="POST" class="display-flex flex-column gap40 align-center color-grey">
    <div class="display-flex flex-column gap15 width100">
        <label for="name" class="arial font-24">Nom</label>
        <input type="text" name="name" id="name" placeholder="Votre nom">
    </div>
    <div class="display-flex flex-column gap15 width100">
        <label for="email" class="arial font-24">Email</label>
        <input type="email" name="email" id="email" placeholder="Votre email">
    </div>
    <div class="display-flex flex-column gap15 width100">
        <label for="password" class="arial font-24">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="************">
    </div>
    <button type="submit" class="jersey-10-regular color-white">S'enregistrer</button>
</form>

<?php
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';