<!--UserManager-->
<!--Votre class UserManager doit hériter d'AbstractManager et contiendra 4 méthode publiques :-->

<!--getAllUsers() : array-->
<!--qui renvoie la liste de tous les utilisateurs présents dans la base de données-->

<!--getUserById(int $id) : User-->
<!--qui renvoie l'utilisateur correspondant à l'$id dans la base de donn'és.-->

<!--insertUser(User $user) : User-->
<!--qui insère l'utilisateur dans la base de données puis le retourne avec son nouvel $id.-->

<!--editUser(User $user) : void-->
<!--qui modifie l'utilisateur dans la base de données puis le retourne avec son nouvel $id.-->
<?php
require '../models/User.php';
require 'AbstractManager.php';
class UserManager extends AbstractManager {
    
    public function __construct()
    {
        
    }

    public function getAllUsers() : array
    {
        $this->db=$db;
        $query = $db->prepare("SELECT * FROM users");
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
        $this->db=$db;
        $query = $db->prepare("SELECT * FROM users WHERE id=:id");
        $parameters = [
            'id'=>$id
        ];
        $query->execute($parameters);
        $users = $query->fetch(PDO::FETCH_ASSOC);
        $return = new User($user["id"],$user["email"],$user["username"],$user["password"]);
        return $return ;
    }
    public function insertUser(User $user) : User
    {
        $this->db=$db;
        $query = $db->prepare('INSERT INTO users VALUES (null, :value1, :value2, :value3)');
        $parameters = [
        'value1' => $user->getUsername(),
        'value2' => $user->getEmail(),
        'value3' => $user->getPassword()
        ];
        $query->execute($parameters);
        
        $newuser=$query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function editUser(User $user) : void
    {
    $this->db=$db;
    $query = $db->prepare("UPDATE users SET email=:email, username=:username, password=:password WHERE authors.id=:id");
    $parameters = [
        'id'=>$user->getId(),
        'email'=>$user->getEmail(),
        'username'=>$user->getUsername(),
        'password'=>$user->getPassword()
    ];
    $query->execute($parameters);
    $user->setId($user["id"]);
    }
}
?>