<?php 

include_once 'datos.php';
class user extends datos{

    private $username;

    public function userExists($user,$pass)
    {
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE Nombre_usuario = :user AND Password = :pass');
        $query->execute(['user' => $user, 'pass' =>$pass]);
        if($query ->rowCount())
        {
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE Nombre_usuario = :user');
        $query->execute(['user'=> $user]);

        foreach ($query as $currentUser) {
            $this->username = $currentUser['Nombre_usuario'];
        }
    }
    public function getUsername()
    {
        return $this->Nombre_usuario;
    }
}

?>