<?php
require 'managers/UserManager.php';
require'services/Router.php';
$newrouter = new Router();
$um = new UserManager("kilyangerard_phpj11","3306","db.3wa.io","kilyangerard","e17f39e5cb4de95dba99a2edd6835ab4");
if (isset ($_GET["route"]))
{
    $newrouter->checkRoute($_GET["route"]);
}
else
{
    $newrouter->checkRoute("");
}

$user = new User ("test@test.fr","test","test");
$user=$um->insertUser($user);
$user->setEmail("modif@test.fr");
var_dump($user);
$um->editUser($user);
?>