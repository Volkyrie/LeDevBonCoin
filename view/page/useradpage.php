<?php

$title = "Mes annonces";
ob_start();
?>

<h1 class="jersey-10-regular color-grey">Mes annonces</h1>
<div class="justify-evenly display-flex width100 flex-wrap flex-row">
<?php
foreach($ads as $ad) :
?>
    <div class="card">
        <article class="gap30 display-flex flex-column align-center color-grey" data-category="<?= $ad->getCategory() ?>">
            <h2 class="width100"><?= $ad->getTitle() ?></h2>
            <p class="width100">Catégorie : <?= $ad->getCategory() ?></p>
            <p class="width100"><?= $ad->getDescription() ?></p>
            <p class="width100">Prix : <?= $ad->getPrice() ?></p>
            <div class="display-flex gap15 ad-action">
                <a href="/ledevboncoin/editad/<?= $ad->getId() ?>" class="jersey-10-regular edit-btn">Editer</a>
                <button class="jersey-10-regular delete-btn color-white delete-ad" value="<?= $ad->getId() ?>">Supprimer</button>
            </div>
        </article>
</div>
<?php
endforeach;
?>
<div id="popup" class="confirmation hidden flex-column gap15 align-center">
    <p>Voulez-vous vraiment supprimer votre annonce ?</p>
    <div class="confirm-action gap15 display-flex">
        <button id="delete" class="jersey-10-regular edit-btn color-white">Oui</button>
        <button id="cancel" class="jersey-10-regular delete-btn color-white">Non</button>
    </div>
</div>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';

/* "/ledevboncoin/deletead/<?= $ad->getId() ?>" */