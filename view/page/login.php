<?php

$title = "Page d'accueil";
ob_start();
?>

<h1>Se connecter</h1>
<form action="/ledevboncoin/login" method="POST">
    <label for="email">Email</label>
    <input type="email" name="email" id="email"><br>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password"><br>
    <button type="submit">Se connecter</button>
</form>
<?php
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';