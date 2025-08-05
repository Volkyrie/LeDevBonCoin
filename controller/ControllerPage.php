<?php
class ControllerPage {
    public function homePage() {
        if(isset($_SESSION['id'])) {
            $username = $_SESSION['name'];
        }
        $modelPage = new ModelPage();
        $ads = $modelPage->getAds();
        $categories = $modelPage->getCategories();
        require './view/page/homepage.php';
    }

    public function postPage() {

    }
}