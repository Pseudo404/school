<?php    
    class Admin extends AbstractUser
    {
        use Debug;
        protected string $role = "ADMIN";

        public function __construct(protected string $username, protected string $password){}

        public function changeMemberRole(Member $member) : void
        {
            if ($member->getRole() === "MEMBER")
            {
                $member->setRole("PREMIUM_MEMBER");
            }
            else
            {
                $member->setRole("MEMBER");
            }
        }
        public function getAll() : string
        {
            return $this->username." ".$this->password." ".$this->role."<br>";
        }
    }
?>