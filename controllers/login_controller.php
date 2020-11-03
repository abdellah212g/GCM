<?php
if(!empty($_SESSION['username'])) {
    $access = $db->selectValue('access', 'users', 'username', $_SESSION['username']);
    $default = $db->selectValue('default_page', 'roles', 'access', $access);
    $page = $default;
}

if(!empty($_POST) && isset($_POST['login']))
{

    if ( isset($_POST['uname']) && isset($_POST['psw']) )
    {
        $username = $_POST['uname'];
        $password = $_POST['psw'];

        $query_password = $db->selectValue('password', 'users', 'username', $username);

        if( $password == $query_password )
        {
            $query_username = $db->selectValue('username', 'users', 'username', $username);
            $_SESSION['username'] = $query_username;
            $access = $db->selectValue('access', 'users', 'username', $_SESSION['username']);
            $default = $db->selectValue('default_page', 'roles', 'access', $access);
            $page = $default;
        } else {
            warning('Wrong Password !');
        }
    } else {
        header("Location: 404.php");
    }
}

if(!empty($_POST) && isset($_POST['subscribe']))
{
    if ( isset($_POST['name']) && isset($_POST['confirmPsw']) && isset($_POST['email']) )
    {
        $query_users = $db->selectColumn('username', 'users');
        $query_emails = $db->selectColumn('email', 'users');

        $search_user = array_search($_POST['name'], $query_users);
        $search_email = array_search($_POST['email'], $query_emails);

        if(is_int($search_user))
        {
            warning('Username already exist !');
        } 
        elseif (is_int($search_email))
        {
            warning('E-mail already exist !');
        } else {
            $newUser = array(
                "username"=>$_POST['name'],
                "email"=>$_POST['email'],
                "password"=>$_POST['confirmPsw']
            );

            $db->insertRow('users', ':username, :email, :password', $newUser);
            $query_username = $db->selectValue('username', 'users', 'username', $_POST['name']);
            $_SESSION['username'] = $query_username;
            $access = $db->selectValue('access', 'users', 'username', $_SESSION['username']);
            $page = 'record';
        }
    } else {
        header("Location: 404.php");
    }
}
