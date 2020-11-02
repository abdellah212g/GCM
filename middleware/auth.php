<?php
if(!empty($_SESSION['username']))
{
    $page = $_GET['page'];
} else {
    header("Location: 404.php");
}

$access = $db->fetchValue('access', 'users', 'username', $_SESSION['username']);