<?php 
include_once "core/init.php";

//definition de la page courante
if(isset($_GET['page']) AND !empty($_GET['page']))
{
    if ($_GET['page'] == 'logout'){
        session_destroy();
        unset($_SESSION['username']);
        $page= 'home';
    } else {
        $page = trim(strtolower($_GET['page'])); //HOME
    }
} else {
    $page = 'home';
}

 //array contenant toutes les pages
$all_pages = scandir('controllers/');

if(in_array($page.'_controller.php', $all_pages)){
    include_once 'models/'.$page.'_model.php';
    include_once 'controllers/' . $page . '_controller.php';
    include_once 'views/' . $page . '_view.php';
}else {
    header("Location: 404.php");
}
