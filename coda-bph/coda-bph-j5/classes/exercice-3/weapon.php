<?php 

    class Weapon
    {
        public function __construct(private string $name, private int $damages){}

        public function getName() : string
        {
            return $this->name;
        }
        public function getDamages() : int
        {
            return $this->damages;
        }

        public function setName(string $name) : void
        {
            $this->name = $name;
        }
        public function setDamages(int $damages) : void
        {
            $this->damages = $damages;
        }

        public function strike() : string
        {
            return "Mais aïeuh! <br>";
        }
    }
?>