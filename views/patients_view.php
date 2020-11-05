<?php 
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';
$patients_name = $db->innerJoin('civ, birth, first_name, last_name, address, phone, comment, progress', 'users', 'id', 'records', 'user_id');
?>

<div class="w3-container">
  <h5>Patients</h5>
  <ul class="w3-ul w3-card-4 w3-white">
    <?php foreach($patients_name as $key=>$value): ?>
    <div class="w3-row">
      <div class="w3-col m2 text-center w3-container w3-padding">
        <img class="w3-circle" src="assets/img/profile.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4><?= ucfirst($value['civ']) . " " . ucfirst($value['first_name']) . " " . ucfirst($value['last_name']) ?></h4>
        <h4><?= $value['address'] . " " ?><span class="w3-opacity w3-medium"><?= $value['phone'] ?></span></h4>
        <h4><?= formatDate($value['birth']) ?></h4>
        <p><?= ucfirst($value['comment']) ?></p><br>
        
        <div class="w3-grey">
          <div class="w3-container w3-center w3-padding w3-green" style="width:<?= $value['progress'] ?>%"></div>
        </div>
        <div style="margin:40px;width:70%;height:2px;background-color:black;"></div>
      </div>
    </div>
    <?php endforeach; ?>
  </ul>
</div>
