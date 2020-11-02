<?php
session_start();
include_once 'helpers/functions.php';
include_once 'core/classes/Autoloader.php';
Autoloader::load();

$db = new Erebos('localhost', 'gcm', 'root', '');
