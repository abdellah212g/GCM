<?php
include_once 'helpers/functions.php';
autoload();

$db = new Erebos('localhost', 'gcm', 'root', '');

// $newUser = array(
//     "username"=>'iliass',
//     "email"=>'iliass@example.com',
//     "password"=>"123",
// );

// $query1 = $db->fetchValue('password', 'users', 'username', 'abdou');
// $query2 = $db->fetchObject('users', 'username', 'abdou');
// $query3 = $db->insertRow('users', ':username, :email, :password', $newUser);
// $query4 = $db->fetchObject('users', 'username', 'iliass');

// debug($query1);