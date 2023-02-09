<!--UserController-->
<!--Votre class UserController doit hériter d'AbstractController et contiendra :-->

<!--1 attribut private :-->

<!--$manager qui est un UserManager.-->
<!--3 méthodes publiques :-->
<!--index()-->
<!--Utilise son manager pour récupérer la liste complète des utilisateurs de la base de données.-->

<!--Demande à render d'afficher users/index.phtml avec cette même liste.-->

<!--create(array $post)-->
<!--Si le formulaire de création a été soumis : utilise les champs présents dans $_POST pour appeler son manager 
qui créera un nouvel User dans la base de données.-->

<!--Demande à render d'afficher users/create.phtml.-->

<!--edit(array $post)-->
<!--Si le formulaire de modification a été soumis : utilise les champs présents dans $_POST pour appeler son manager 
qui modifiera le User dans la base de données.-->

<!--Demande à render d'afficher users/edit.phtml.-->
<?php
require 'AbstractController.php';
class UserController extends AbstractController {
    private UserManager $manager;
    
    public function __construct()
    {
        $this->manager = new UserManager("kilyangerard_phpj11","3306","db.3wa.io","kilyangerard","e17f39e5cb4de95dba99a2edd6835ab4");
    }
    public function index()
        {
            $users=$this->manager->getAllUsers();
            $this->render("index", ["users"=>$users]);
        }
        
        public function create(array $post)
        {
            $user = new User($post['email'], $post['username'], $post['password']);
            $this->manager-> insertUser($user);
            render("create", ["user"=>$this->manager->insertUser($user)]);
        }
        
        public function edit(array $post)
        {
            $user = new User($post['email'], $post['username'], $post['password']);
            $this->manager-> editUser($user);
            render("edit", ["user"=>$user]);
        }
}

?>