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
class UserController extends AbstractController {
    private UserManager $manager;
    
    public function __construct()
    {
        $this->manager = new UserManager();
    }

    public function index()
    {
        $this->manager->getAllUsers();
        $this->manager->render($view,$values);
        require $view.'/'.$values.'.phtml'; 
    }
    public function create(array $post)
    {
        
    }
    public function edit(array $post)
    {
        
    }
}

?>