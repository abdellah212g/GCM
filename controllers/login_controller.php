<?php
if(!empty($_POST) && isset($_POST['submit']))
{

    if ( isset($_POST['uname']) && isset($_POST['psw']) )
    {
        $username = $_POST['uname'];
        $password = $_POST['psw'];

        $query_password = $db->fetchValue('password', 'users', 'username', $username);

        if( $password == $query_password ){
            $query_username = $db->fetchValue('username', 'users', 'username', $username);
            $_SESSION['username'] = $query_username;
            $access = $db->fetchValue('access', 'users', 'username', $_SESSION['username']);
            $page = 'user';
        } else {
            echo "<script>alert(\"Error password!\")</script>";
        }
    } else {
        header("Location: 404.php");
    }
}

if(!empty($_POST) && isset($_POST['submitForm']))
{
    if ( isset($_POST['name']) && isset($_POST['confirmPsw']) && isset($_POST['email']) )
    {
        $newUser = array(
            "username"=>$_POST['name'],
            "email"=>$_POST['email'],
            "password"=>$_POST['confirmPsw']
        );

        $query3 = $db->insertRow('users', ':username, :email, :password', $newUser);
        $page = 'user';
    } else {
        header("Location: 404.php");
    }
}
