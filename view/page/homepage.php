<?php

$title = "Page d'accueil";
ob_start();
?>

<h1 class="jersey-10-regular color-grey">Toutes les annonces</h1>

<?php
foreach($ads as $ad) :
?>

<article class="card gap30 display-flex flex-column align-center">
    <h2 class="width100"><?= $ad->getTitle() ?></h2>
    <p class="width100">Catégorie : <?= $ad->getCategory() ?></p>
    <p class="width100"><?= $ad->getDescription() ?></p>
    <p class="width100">Prix : <?= $ad->getPrice() ?></p>
    <button class="jersey-10-regular color-white">Contacter le vendeur</button>
</article>

<?php
endforeach;
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';