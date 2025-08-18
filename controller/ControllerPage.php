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
        $modelPage = new ModelPage();
        $categories = $modelPage->getCategories();
        if(isset($_SESSION['id'])) {
            if($_SERVER['REQUEST_METHOD'] === 'GET') {
                require './view/page/postadpage.php';
            } else {
                $title = trim($_POST['title']);
                $category = ucfirst(strtolower(trim($_POST['category'])));
                $price = trim($_POST['price']);
                $description = trim($_POST['description']);
                $success = $modelPage->postAd($title, $category, $price, $description, $_SESSION['id']);
                if($success == true) {
                    $_SESSION['success'] = "Votre annonce a bien été enregistrée";
                } else {
                    $_SESSION['error'] = "Votre annonce n'a pas pu être enregistrée";
                }
                header('Location: /ledevboncoin/');
            }
        } else {
            header('Location: /ledevboncoin/login');
            exit;
        }
    }

    public function adPage(int $id) {
        if(isset($_SESSION['id'])) {
            $modelPage = new ModelPage();
            $ad = $modelPage->getOneAdById($id);
            $categories = $modelPage->getCategories();
            require './view/page/adpage.php';
        } else {
            header('Location: /ledevboncoin/login');
            exit;
        }
    }
}