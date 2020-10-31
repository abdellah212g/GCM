<?php
include_once 'helpers/functions.php';
autoload();

$db = new Database('localhost', 'gcm', 'root', 'rasetasa@click@1200');
// $db->setFetchMode(PDO::FETCH_ASSOC);

$request = <<<EOT
    Select * users
EOT;

$query = $db->fetch($request);


debug($query);