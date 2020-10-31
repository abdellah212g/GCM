<?php
if(!empty($_POST) && isset($_POST['submit'])){

    if (isset( $_POST['login']) && isset($_POST['password'] ))
    {
        $username = $_POST['login'];
        $password = $_POST['password'];

        $query_password = $db->fetchValue('password', 'users', 'username', $username);

        if( $password == $query_password )
        {
            $page = 'user';
        } else {
            echo 'Error password !! ';
        }

    } else {
        header("Location: 404.php");
    }
}