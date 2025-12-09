<?php

class UserController extends AbstractController
{
    public function profile() :void
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('index.php?route=login');
            echo 'Vous devez être connecté pour accéder à cette page.';
            return;
        }
        $this->render('member/profile.html.twig', []);
    }

    public function create() :void
    {
        if ($_SESSION['user_role'] === 'ADMIN') {
            $this->render('admin/users/create.html.twig', []);

            if (!empty($_POST)) {
                if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) &&
                    isset($_POST['password']) && isset($_POST['role']) &&
                    !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) &&
                    !empty($_POST['password']) && !empty($_POST['role'])) {
                    $firstName = htmlspecialchars($_POST['firstName']);
                    $lastName = htmlspecialchars($_POST['lastName']);
                    $email = htmlspecialchars($_POST['email']);
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $role = htmlspecialchars($_POST['role']);
                    $userManager = new UserManager();
                    if ($role === 'ADMIN' || $role === 'USER') {
                        if ($userManager->findByEmail($email) === null) {
                            $user = new User($firstName, $lastName, $email, $password, $role);
                            $userManager->create($user);
                            $this->redirect('index.php?route=list');
                        } else {
                            echo 'Un utilisateur avec cet email existe déjà.';
                        }
                    } else {
                        echo 'Le rôle spécifié n\'est pas valide.';
                    }
                } else {
                    echo 'Veuillez remplir tous les champs.';
                }
            }
        }else{
            $this->redirect('index.php?route=login');
            echo 'Vous n\'avez pas la permission d\'accéder à cette page.';
        }
        
    }

    public function update() : void
    {
        if ($_SESSION['user_role'] === 'ADMIN') {

            $userManager = new UserManager();
            $user = $userManager->findById($_GET['id']);
            $user_inspect = [
                'id' => $user->getId(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'role' => $user->getRole()
            ];
            if (!empty($_POST)) {
                if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) &&
                    isset($_POST['password']) && isset($_POST['role']) &&
                    !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) &&
                    !empty($_POST['password']) && !empty($_POST['role'])) {
                    $firstName = htmlspecialchars($_POST['firstName']);
                    $lastName = htmlspecialchars($_POST['lastName']);
                    $email = htmlspecialchars($_POST['email']);
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $role = htmlspecialchars($_POST['role']);
                    if ($role === 'ADMIN' || $role === 'USER') {
                        $user->setFirstName($firstName);
                        $user->setLastName($lastName);
                        $user->setEmail($email);
                        $user->setPassword($password);
                        $user->setRole($role);
                        $userManager->update($user);
                        $this->redirect('index.php?route=list');
                    } else {
                        echo 'Le rôle spécifié n\'est pas valide.';
                    }
                } else {
                    echo 'Veuillez remplir tous les champs.';
                }
            }
            $this->render('admin/users/update.html.twig', ['user_inspect' => $user_inspect]);
        }else{
            $this->redirect('index.php?route=login');
            echo 'Vous n\'avez pas la permission d\'accéder à cette page.';
        }
    }

    public function delete() : void
    {
        $userManager = new UserManager();
        $user = $userManager->findById($_GET['id']);
        $userManager->delete($user);
        $this->redirect("index.php?route=list");
    }

    public function list() : void
    {
        if ($_SESSION['user_role'] === 'ADMIN') {
            $userManager = new UserManager();
            $users = $userManager->findAll();
            $all = [];
            foreach ($users as $user) {
                 $all[] = [
                    'id' => $user->getId(),
                    'firstName' => $user->getFirstName(),
                    'lastName' => $user->getLastName(),
                    'email' => $user->getEmail()
                ];
            }
            $this->render('admin/users/index.html.twig', ['users' => $all]);
        }else{
            $this->redirect('index.php?route=login');
            echo 'Vous n\'avez pas la permission d\'accéder à cette page.';
        }
    }

    public function show() : void
    {
        if ($_SESSION['user_role'] === 'ADMIN') {
            $userManager = new UserManager();
            $user = $userManager->findById($_GET['id']);
            $user_inspect = [
                'id' => $user->getId(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),
                'role' => $user->getRole()
            ];
            $this->render('admin/users/show.html.twig', ['user_inspect' => $user_inspect]);
        }else{
            $this->redirect('index.php?route=login');
            echo 'Vous n\'avez pas la permission d\'accéder à cette page.';
        }
    }
}
