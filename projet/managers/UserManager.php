<?php
require 'models/User.php';
require 'AbstractManager.php';
class UserManager extends AbstractManager {
    
    public function __construct(string $dbName, string $port, string $host, string $username, string $password)
    {
        $this->dbname = "kilyangerard_phpj11";
        $this->port = "3306";
        $this->host = "db.3wa.io";
        $this->username = "kilyangerard";
        $this->password = "e17f39e5cb4de95dba99a2edd6835ab4";
        $this->initDb();
    }

    public function getAllUsers() : array
    {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute([]);
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        $return = [];
        foreach ($users as $user)
        {
            $return[] = new User($user["id"],$user["email"],$user["username"],$user["password"]);
        }
        return $return;
    }
    public function getUserById(int $id) : User
    {
       
        $query = $this->db->prepare("SELECT * FROM users WHERE id=:id");
        $parameters = [
            'id'=>$id
        ];
        $query->execute($parameters);
        $users = $query->fetch(PDO::FETCH_ASSOC);
        $return = new User($users["id"],$users["email"],$users["username"],$users["password"]);
        $return->setId($users["id"]);
        return $return ;
    }
    public function insertUser(User $user) : User
    {
        $query = $this->db->prepare('INSERT INTO users VALUES (null, :value1, :value2, :value3)');
        $parameters = [
        'value1' => $user->getUsername(),
        'value2' => $user->getEmail(),
        'value3' => $user->getPassword()
        ];
        $query->execute($parameters);
        
        $newuser=$query->fetch(PDO::FETCH_ASSOC);
        $newuser->setId($user["id"]);
        return $user;
    }
    
    public function editUser(User $user) : void
    {
    $query = $this->db->prepare("UPDATE users SET email=:email, username=:username, password=:password WHERE users.id=:id");
    $parameters = [
        'id'=>$user->getId(),
        'email'=>$user->getEmail(),
        'username'=>$user->getUsername(),
        'password'=>$user->getPassword()
    ];
    $query->execute($parameters);
    }
}
?>