<?php

class AuthController extends AbstractController
{
   public function home() : void
    {
        $this->render('home/home.html.twig', []);
    }

    public function login() : void
    {
        $this->render('auth/login.html.twig', []);
        if (!empty($_POST)) {
            if (isset($_POST['email']) && isset($_POST['password']) &&
                !empty($_POST['email']) && !empty($_POST['password'])) {
                $email = htmlspecialchars($_POST['email']);
                $password = $_POST['password'];
                $userManager = new UserManager();
                $user = $userManager->findByEmail($email);
                if ($user !== null) {
                    if (password_verify($password, $user->getPassword())) {
                        $_SESSION['user_id'] = $user->getId();
                        $_SESSION['user_role'] = $user->getRole();
                        $this->redirect('index.php?route=profile');
                    } else {
                        echo 'Mot de passe incorrect.';
                    }
                } else {
                    echo 'Email incorrect.';
                }
            } else {
                echo 'Veuillez remplir tous les champs.';
            }
        }
    }

    public function logout() : void
    {
        session_destroy();
        $this->redirect('index.php');
    }

    public function register() : void
    {
        $this->render('auth/register.html.twig', []);
        if (!empty($_POST)) {
            if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) &&
                isset($_POST['password']) && isset($_POST['confirmPassword']) &&
                !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) &&
                !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
                $firstName = htmlspecialchars($_POST['firstName']);
                $lastName = htmlspecialchars($_POST['lastName']);
                $email = htmlspecialchars($_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $role = "USER";
                if ($_POST['password'] === $_POST['confirmPassword']) {
                    $userManager = new UserManager();
                    if ($userManager->findByEmail($email) === null) {
                        $user = new User($firstName, $lastName, $email, $password, $role);
                        $userManager->create($user);
                        $this->redirect('index.php?route=login');
                    } else {
                        echo 'Un utilisateur avec cet email existe déjà.';
                    }
                } else {
                    echo 'Les mots de passe ne correspondent pas. Veuillez taper le même mot de passe dans les deux champs.';
                }
            } else {
                echo 'Veuillez remplir tous les champs.';
            }
        }
    }

    public function notFound() : void
    {
        $this->render('error/notFound.html.twig', []);
    }
}