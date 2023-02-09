<!--Créez une classe abstraite AbstractController, qui contient une méthode publique :-->

<!--render(string $view, array $values) : void-->
<!--La méthode render doit initialiser la variable $template avec la valeur de $view et la variable $data avec la valeur de $values. Puis elle doit require layout.phtml.-->

<?php
abstract class AbstractController {
    

    // ...

    public function render(string $view, array $values) : void
    {
        $template=$view;
        $data=$values;
        require 'views/layout.phtml';
    }

}


?>