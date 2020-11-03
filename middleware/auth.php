<?php
if (!empty($_SESSION['username']))
{
    $access = $db->fetchValue('access', 'users', 'username', $_SESSION['username']);
    $default = $db->fetchValue('default_page', 'roles', 'access', $access);

    switch ($access) {
        case '1':
            if ($_GET['page'] == 'record' || $_GET['page'] == 'appointment' || $_GET['page'] == 'setting') 
            {
                $page = $_GET['page'];
            } else { $page = 'record'; }
            break;

        case '2':
            if ($_GET['page'] == 'calendar' || $_GET['page'] == 'messages' || $_GET['page'] == 'setting') 
            {
                $page = $_GET['page'];
            } else { $page = 'calendar'; }
            break;

        case '3':
            if ($_GET['page'] != 'record' || $_GET['page'] != 'appointment') 
            {
                $page = $_GET['page'];
            } else { $page = 'user'; }
            break;

        case '4':
            $page = $_GET['page'];
            break;
        
        default:
            header("Location: 404.php");
            break;
    }
} else {
    header("Location: 404.php");
}
