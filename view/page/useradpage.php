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
        <article class="gap30 display-flex flex-column align-center color-grey">
            <h2 class="width100"><?= $ad->getTitle() ?></h2>
            <p class="width100">Catégorie : <?= $ad->getCategory() ?></p>
            <p class="width100"><?= $ad->getDescription() ?></p>
            <p class="width100">Prix : <?= $ad->getPrice() ?></p>
            <div class="display-flex gap15">
                <a href="/ledevboncoin/editad/<?= $ad->getId() ?>" class="jersey-10-regular edit-btn">Editer</a>
                <a href="/ledevboncoin/deletead/<?= $ad->getId() ?>" class="jersey-10-regular delete-btn">Supprimer</a>
            </div>
            
        </article>
</div>
<?php
endforeach;
?>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';