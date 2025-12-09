<?php 
    class UserManager extends AbstractManager
    {

        public function __construct(){
            parent::__construct();
        }
        public function create(User $user) : User
        {
            $query = $this->db->prepare('INSERT INTO users (email, first_name, last_name) VALUES(:email, :first_name, :last_name)');
            $parameters = [
                'email' => $user->getEmail(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName()
            ];
            $query->execute($parameters);
            $user->setId($this->db->lastInsertId());
            return $user;
        }
        public function update(User $user) : User
        {
            $query = $this->db->prepare('UPDATE users SET email=:email, first_name=:first_name, last_name=:last_name WHERE id=:id');
            $parameters = [
                'email' => $user->getEmail(),
                'id' => $user->getId(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName()
            ];
            $query->execute($parameters);
            return $user;
        }
        public function delete(User $user) : void
        {
            $query = $this->db->prepare('DELETE FROM users WHERE id=:id');
            $parameters = [
                'id' => $user->getId()
            ];
            $query->execute($parameters);
        }
        public function findOne(int $id) : ?User
        {
            $query = $this->db->prepare('SELECT * FROM users WHERE id=:id');
            $parameter = [
                'id' => $id
            ];
            $query->execute($parameter);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user === FALSE) {
                return NULL;
            }
            $u = new User($user['email'], $user['first_name'], $user['last_name']);
            $u->setId($user['id']);
            return $u;
        }
        public function findAll() : array
        {
            $tab = [];
            $query = $this->db->prepare('SELECT * FROM users');
            $query->execute();
            $users = $query->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
    }