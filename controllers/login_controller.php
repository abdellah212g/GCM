<?php
$fetched_data = array(['login'=>'Abdou', 'password'=>'123'], ['login'=>'Iliass', 'password'=>'321']);

if (isset($_POST['login']) && isset($_POST['password']))
{
    $search_password = array_search($_POST['password'], array_column($fetched_data, 'password'));

    if(is_int($search_password))
    {
        echo 'Connected';
    } else {
        $new_login = array('login'=>$_POST['login'], 'password'=>$_POST['password']);
        $new_data = $fetched_data + $new_login;

        echo "<pre>";
        print_r($new_data);
        echo "<pre>";
    }

} else {
    header("Location: ../404.php");
}