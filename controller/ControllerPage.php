<?php
class ControllerPage {
    public function homePage() {
        // if(!isset($_SESSION['id'])) {
        //     header('Location: /mangatheque/login');
        //     exit;
        // }
        $modelPage = new ModelPage();
        $ads = $modelPage->getAds();
        require './view/page/homepage.php';
    }
}