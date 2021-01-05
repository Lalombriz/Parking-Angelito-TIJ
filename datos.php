<?php


class datos{
    private $host;
    private $user;
    private $password;
    private $db;
    private $charset;


    public function __construct()
    {
       $this->host= 'localhost';
       $this->user= 'omdprofx_eduardogutierrez';
       $this->password ='Edu25519';
       $this->db = 'omdprofx_eduardogutierrez-proyecto';
       $this->charset = 'utf8mb4'; 
    }

    public function connect()
    {
        try {
            $conexion = "mysql:host=". $this->host.";dbname=". $this->db.";charset=". $this->charset;
            $options = [PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES => false];
            $pdo = new PDO($conexion, $this->user,$this->password,$options);
            return $pdo;
        } catch (PDOException $e) {
            print_r("Error en la conexion.".$e->getMessage());
        }
    }
}