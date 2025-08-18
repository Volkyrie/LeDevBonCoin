<?php
class ControllerAuth {
    public function register() {
        $modelPage = new ModelPage();
        $categories = $modelPage->getCategories();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['error'] = "Tous les champs doivent être remplis.";
                header('Location: /ledevboncoin/register');
                exit;
            }

            $pseudo = trim($_POST['name']);
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);

            $modelUser = new ModelUser();
            if($modelUser->searchUser($email) == NULL) {
                $successUser = $modelUser->createUser($pseudo, $email, $password);
            } else {
                $_SESSION['error'] = "Cet email est déjà enregistré.";
                header('Location: /ledevboncoin/register');
                exit;
            }
            
            if($successUser) {
                $_SESSION['success'] = "Vous êtes bien enregistré. Vous pouvez vous connecter !";
                header('Location: /ledevboncoin/login');
                exit;
            } else {
                $_SESSION['error'] = "Erreur lors de l'insertion.";
                header('Location: /ledevboncoin/register');
                exit;
            }
        }
        require __DIR__ . '/../view/page/register.php';
    }

    public function login() {
        $modelPage = new ModelPage();
        $categories = $modelPage->getCategories();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['error'] = "Tous les champs doivent être remplis.";
                header('Location: /ledevboncoin/register');
                exit;
            }

            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);

            $modelUser = new ModelUser();
            $user = $modelUser->searchUser($email);
            if($user && password_verify($password, $user->getPassword())) {
                $_SESSION['success'] = "Vous êtes connecté.";
                $_SESSION['id'] = $user->getId();
                $_SESSION['name'] = $user->getName();
                header('Location: /ledevboncoin');
                exit;
            } else {
                $_SESSION['error'] = "Erreur lors de la connexion, vérifiez votre email et votre mot de passe.";
                header('Location: /ledevboncoin/login');
                exit;
            }
        }
        require __DIR__ . '/../view/page/login.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /ledevboncoin');
        exit;
    }
}