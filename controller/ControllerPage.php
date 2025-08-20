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
        $modelPage = new ModelPage();
        $ad = $modelPage->getOneAdById($id);
        $categories = $modelPage->getCategories();
        require './view/page/adpage.php';
    }

    public function userAdPage() {
        if(isset($_SESSION['id'])) {
            $modelPage = new ModelPage();
            $ads = $modelPage->getAdsByAuthor($_SESSION['id']);
            $categories = $modelPage->getCategories();
            require './view/page/useradpage.php';
        } else {
            header('Location: /ledevboncoin/login');
            exit;
        }
    }

    public function editAdPage(int $id) {
        if(isset($_SESSION['id'])) {
            $modelPage = new ModelPage();
            $categories = $modelPage->getCategories();
            if($_SERVER['REQUEST_METHOD'] === 'GET') {
                $ad = $modelPage->editOneAdById($id);
                require './view/page/editadpage.php';
            } else {
                $title = trim($_POST['title']);
                $category = ucfirst(strtolower(trim($_POST['category'])));
                $price = trim($_POST['price']);
                $description = trim($_POST['description']);
                $success = $modelPage->editAd($id, $title, $category, $price, $description, $_SESSION['id']);
                if($success == true) {
                    $_SESSION['success'] = "Votre annonce a bien été modifiée";
                } else {
                    $_SESSION['error'] = "Votre annonce n'a pas pu être modifiée";
                }
                header('Location: /ledevboncoin/userad');
            }
        } else {
            header('Location: /ledevboncoin/login');
            exit;
        }
    }

    public function deleteAdPage($id) {
        if(isset($_SESSION['id'])) {
            $modelPage = new ModelPage();
            $categories = $modelPage->getCategories();
            $success = $modelPage->deleteOneAdById($id);
            if($success == true) {
                $_SESSION['success'] = "Votre annonce a bien été supprimée";
            } else {
                $_SESSION['error'] = "Votre annonce n'a pas pu être supprimée";
            }
            header('Location: /ledevboncoin/userad');
        } else {
            header('Location: /ledevboncoin/login');
            exit;
        }
    }
}