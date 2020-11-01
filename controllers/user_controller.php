<?php
if(!empty($_SESSION['username']))
{
    $page = 'user';
    
} else {
    header("Location: 404.php");
}

$access = $db->fetchValue('access', 'users', 'username', $_SESSION['username']);