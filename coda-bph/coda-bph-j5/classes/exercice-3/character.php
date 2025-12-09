<?php 

    require "weapon.php";

    class Character
    {
        private Weapon $weapon;

        public function __construct(private string $name)
        {
            $this->weapon = new Weapon("", 0);
        }

        public function getName() : string
        {
            return $this->name;
        }
        public function getWeapon() : Weapon
        {
            return $this->weapon;
        }

        public function setName(string $name) : void
        {
            $this->name = $name;
        }
        public function setWeapon(string $weaponName, int $weaponDamages) : void
        {
            $this->weapon->setName($weaponName);
            $this->weapon->setDamages($weaponDamages);
        }

        public function fight() : string
        {
            return $this->weapon->strike();
        }
    }
?>