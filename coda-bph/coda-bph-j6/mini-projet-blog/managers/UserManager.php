<?php 

    class UserManager extends AbstractManager
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function findAll()
        {
            $tab = [];
            $query = $this->db->prepare('SELECT * FROM users');
            $query->execute();
            $users = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($users as $user)
            {
                $u = new User($user['username'], $user['email'], $user['password'], $user['role'], new DateTime($user['created_at']));
                $u->setId($user['id']);
                $tab[] = $u;
            }
            return $tab;
        }

        public function findOne(int $id): ?User
        {
            $query = $this->db->prepare('SELECT * FROM users WHERE id=:id');
            $parameter = [
                'id' => $id
            ];
            $query->execute($parameter);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user === NULL) {
                return NULL;
            }

            $u = new User($user['username'], $user['email'], $user['password'], $user['role'], new DateTime($user['created_at']));
            $u->setId($user['id']);
            return $u;
        }

        public function create(User $user)
        {
            $query = $this->db->prepare('INSERT INTO users (username, email, password, role, created_at) VALUES(:username, :email, :password, :role, :created_at)');
            $parameters = [
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'role' => $user->getRole(),
                'created_at' => $user->getCreated_at()->format('Y-m-d H:i:s')
            ];
            $query->execute($parameters);
        }

        public function update(User $user)
        {
            $query = $this->db->prepare('UPDATE users SET username=:username, email=:email, password=:password, role=:role, created_at=:created_at WHERE id=:id');
            $parameters = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'role' => $user->getRole(),
                'created_at' => $user->getCreated_at()->format('Y-m-d H:i:s')
            ];
            $query->execute($parameters);
        }

        public function delete(int $id)
        {
            $query = $this->db->prepare('DELETE FROM users WHERE id=:id');
            $parameters = [
                'id' => $id
            ];
            $query->execute($parameters);
        }
    }
?>