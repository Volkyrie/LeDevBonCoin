<?php

$title = "Page d'accueil";
ob_start();
?>

<h1>Title</h1>

<?php
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';