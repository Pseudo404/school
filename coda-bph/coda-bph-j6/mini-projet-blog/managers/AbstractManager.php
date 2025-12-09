<?php 
    abstract class AbstractManager
    {
        private int $life;
        protected PDO $db;

        public function __construct()
        {
            $host = "localhost";
            $port = "3306";
            $dbname = "coda_bph_j6_blog";
            $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

            $user = "root";
            $password = "";

            $this->db = new PDO(
                $connexionString,
                $user,
                $password
            );
        }
    }
?>