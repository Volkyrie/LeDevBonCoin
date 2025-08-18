<?php

$title = "Page d'accueil";
ob_start();
?>

<h1 class="jersey-10-regular color-grey">Poster une annonce</h1>
<form action="/ledevboncoin/postad" method="POST" class="display-flex flex-column gap40 align-center color-grey">
    <div class="display-flex flex-column gap15 width100">
        <label for="title" class="arial font-24">Titre</label>
        <input type="text" name="title" id="name" required>
    </div>
    <div class="display-flex flex-column gap15 width100">
        <label for="category" class="arial font-24">Catégorie</label>
        <input type="text" name="category" id="category" required>
    </div>
    <div class="display-flex flex-column gap15 width100">
        <label for="price" class="arial font-24">Prix</label>
        <input type="number" name="price" id="price" required>
    </div>
    <div class="display-flex flex-column gap15 width100">
        <label for="description" class="arial font-24">Description</label>
        <textarea type="text" name="description" id="description" required></textarea>
    </div>
    <button type="submit" class="jersey-10-regular color-white">Poster mon annonce</button>
</form>

<?php
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';