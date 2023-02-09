<!--User.php-->
<!--La classe User a 4 attributs privés :-->

<!--$id : int-->
<!--$email : string-->
<!--$username : string-->
<!--$password : string-->
<!--Son constructeur prend email, username et password en paramètres et les initialise. Il initialise id avec la valeur null.-->

<!--Tous les attributs ont des getters et setters publics.-->
<?php
class User {

    // private attribute
    private ?int $id;
    private string $email;
    private string $username;
    private string $password;

    // public constructor
    public function __construct(string $email, string $username, string $password)
    {
        $this->id = null;
        $this->firstName = $email;
        $this->lastName = $username;
        $this->password = $password;
    }

    // public getter
    public function getId() : ?int
    {
        return $this->id;
    }
    public function getUsername() : string
    {
        return $this->username;
    }
    public function getEmail() : string
    {
        return $this->email;
    }
    public function getPassword() : string
    {
        return $this->password;
    }
   
    
    
    // public setter
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }
   
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
}
?>