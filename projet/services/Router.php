<!--Lorsque vous voyez écrit la notation Class::method celà signifie que vous devrez appeler la méthode method de la classe Class.-->

<!--  "route=users" => UserController::index  -->
<!--  "route=user-create" => UserController::create  -->
<!--  "route=user-edit" => UserController::edit  -->
<!--  quoi que ce soit d'autre => UserController::index -->
<?php
class Router {
    private UserController $uc
    public function __construct()
    {
        $this->uc = new UserController();
        
    }
    
    function checkRoute(string $route) : void
    {
        if ($route === "users") 
        {
           $this->uc->index();
        }
        else if ($route === "user-create")
        {
            $this->uc->create();
        }
        
        else if ($route === "user-edit")
        {
            $this->uc->index();
        }
        else
        {
            $this->uc->index();
        }
    }
?>