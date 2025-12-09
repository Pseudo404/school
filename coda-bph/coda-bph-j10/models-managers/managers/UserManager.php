<?php 
    class UserManager extends AbstractManager
    {
        public function create(User $user) : User
        {
            $query = $this->db->prepare('INSERT INTO users (firstName, lastName, email, password, created_at) VALUES(:firstName, :lastName, :email, :password, :created_at)');
            $parameters = [
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'created_at' => $user->getCreated_at()->format('Y-m-d H:i:s')
            ];
            $query->execute($parameters);
            $user->setId($this->db->lastInsertId());
            return $user;
        }
        public function update(User $user) : User
        {
            $query = $this->db->prepare('UPDATE users SET firstName=:firstName, lastName=:lastName, email=:email, password=:password, created_at=:created_at WHERE id=:id');
            $parameters = [
                'id' => $user->getId(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'created_at' => $user->getCreated_at()->format('Y-m-d H:i:s')
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
            $u = new User($user['firstName'], $user['lastName'], $user['email'], $user['password'], new DateTime($user['created_at']));
            $u->setId($user['id']);
            return $u;
        }
        public function findAll() : array
        {
            $tab = [];
            $query = $this->db->prepare('SELECT * FROM users');
            $query->execute();
            $users = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($users as $user)
            {
                $u = new User($user['firstName'], $user['lastName'], $user['email'], $user['password'], new DateTime($user['created_at']));
                $u->setId($user['id']);
                $tab[] = $u;
            }
            return $tab;
        }
    }