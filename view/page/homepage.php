<?php

$title = "Page d'accueil";
ob_start();
?>

<h1 class="jersey-10-regular color-grey">Toutes les annonces</h1>

<?php
foreach($ads as $ad) :
?>

<article class="card">
    <h2><?= $ad->getTitle() ?></h2>
    <p>Catégorie : <?= $ad->getCategory() ?></p>
    <p><?= $ad->getDescription() ?></p>
    <p>Prix : <?= $ad->getPrice() ?></p>
    <button class="jersey-10-regular color-white">Contacter le vendeur</button>
</article>

<?php
endforeach;
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';