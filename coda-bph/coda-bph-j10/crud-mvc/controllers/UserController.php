<?php
    class UserController extends AbstractController
    {
        public function show()
        {
            $this->render("show", []);
        }
        public function create()
        {
            $this->render("create", []);
        }
        public function checkCreate()
        {
            $email = $_POST['email'];
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];

            $user = new User($email, $firstName, $lastName);

            $user_m = new UserManager;
            $user_m->create($user);

            header("Location: index.php");
        }
        public function update()
        {
            $this->render("update", []);
        }
        public function checkUpdate()
        {
            $email = $_POST['email'];
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];

            $u = new User($email, $firstName, $lastName, $_POST['id']);

            $user_m = new UserManager;
            $user_m->update($u);
            header("Location: .");
        }
        public function delete()
        {
            $id = $_GET['id'];
            $um = new UserManager;
            $um->delete($um->findOne($id));
            header("Location: .");
        }
        public function list()
        {
            $this->render("list", []);
        }
    }