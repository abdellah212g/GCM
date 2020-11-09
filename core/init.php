<?php
session_start();
include_once 'helpers/functions.php';
include_once 'core/classes/Erebos.php';

$db = new Erebos('localhost', 'gcm', 'root', '');

// $result = $db->selectValue('timestamp', 'users', 'username', 'hamza');
// $result = $db->updateValue('users', 'access', 1, 'username', 'salim');

// $result = $db->selectRow('users', 'username', 'hamza');
// $newUser = array('username'=>'kador', 'email'=>'kador@example.com', 'password'=>'aze');
// $result = $db->insertRow('users', ':username, :email, :password', $newUser);
// $result = $db->deleteRow('users', 'username', 'lain');

// $result = $db->selectColumn('username', 'users');

// debug($result);

// exit;