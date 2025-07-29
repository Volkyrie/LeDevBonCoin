<?php

$title = "Page d'accueil";
ob_start();
?>

<h1>S'enregistrer</h1>
<form action="/ledevboncoin/register" method="POST">
    <label for="name">Nom</label>
    <input type="text" name="name" id="name" placeholder="Votre nom"><br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Votre email"><br>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="************"><br>
    <button type="submit">S'enregistrer</button>
</form>

<?php
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';