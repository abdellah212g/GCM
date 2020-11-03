<?php 
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';
$patients_name = $db->selectColumn('username', 'users', 'access', '1');
?>

<div class="w3-container">
  <h5>Patients</h5>
  <ul class="w3-ul w3-card-4 w3-white">
    <?php foreach($patients_name as $name): ?>
    <li class="w3-padding-16">
      <img src="assets/img/profile.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
      <span class="w3-xlarge"><?= $name ?></span><br>
    </li>
    <?php endforeach; ?>
  </ul>
</div>