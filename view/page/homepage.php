<?php

$title = "Page d'accueil";
ob_start();
?>

<h1 class="jersey-10-regular color-grey">Toutes les annonces</h1>
<div class="justify-evenly display-flex width100 flex-wrap flex-row">
    <span id="msg" class="hidden justify-center color-grey">Aucun objet dans cette catégorie</span>
    <?php
    foreach($ads as $ad) :
    ?>
        <a class="card" href="/ledevboncoin/ad/<?= $ad->getId() ?>" data-category="<?= $ad->getCategory() ?>">
            <article class="gap30 display-flex flex-column align-center color-grey">
                <h2 class="width100"><?= $ad->getTitle() ?></h2>
                <p class="width100">Catégorie : <?= $ad->getCategory() ?></p>
                <p class="width100"><?= $ad->getDescription() ?></p>
                <p class="width100">Prix : <?= $ad->getPrice() ?></p>
                <button class="jersey-10-regular color-white">Contacter le vendeur</button>
            </article>
        </a>
    <?php
    endforeach;
    ?>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';