<?php
session_start();
include_once 'helpers/functions.php';
include_once 'core/classes/Erebos.php';

$db = new Erebos('localhost', 'gcm', 'root', '');
