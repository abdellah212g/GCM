<?php
if(!empty($_POST) && isset($_POST['submit'])){

    if ( isset($_POST['uname']) && isset($_POST['psw']) )
    {
        $username = $_POST['uname'];
        $password = $_POST['psw'];

        $query_password = $db->fetchValue('password', 'users', 'username', $username);

        if( $password == $query_password )
        {
            $page = 'user';
        } else {
            echo "<script>alert(\"Error password!\")</script>";
        }

    } else {
        header("Location: 404.php");
    }
}