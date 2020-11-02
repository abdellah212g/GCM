<?php
if(!empty($_SESSION['username']))
{
    $page = $_GET['page'];
    $access = $db->fetchValue('access', 'users', 'username', $_SESSION['username']);
} else {
    header("Location: 404.php");
}
