<?php 
    class Character
    {
        protected int $life = 0;
        protected string $name = "";

        public function __construct(){}

        public function getLife() : int
        {
            return $this->life;
        }
        public function getName() : string
        {
            return $this->name;
        }

        public function setLife(int $life) : void
        {
            $this->life = $life;
        }
        public function setName(string $name) : void
        {
            $this->name = $name;
        }

        public function introduce() : string{
            return "Bonjour je m'appelle ".$this->getName();
        }
    }

    class Warrior extends Character
    {
        public function __construct(int $life, string $name, private int $energy){}

        public function getEnergy() : int
        {
            return $this->energy;
        }
        public function setEnergy(int $energy) : void
        {
            $this->energy = $energy;
        }
    }

    class Mage extends Character
    {
        public function __construct(int $life, string $name, private int $mana){}

        public function getMana() : int
        {
            return $this->mana;
        }
        public function setMana(int $mana) : void
        {
            $this->mana = $mana;
        }
    }

    $char = new Character(10, "tktp");

    $war = new Warrior(10, "warrior_guy", 5);

    $mage = new Mage(10, "mage_guy", 5);

    echo $war->introduce()." ".$war->getLife()." ".$war->getEnergy()."<br>";

    echo $mage->introduce()." ".$mage->getLife()." ".$mage->getMana();

?>