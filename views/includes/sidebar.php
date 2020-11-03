<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-animate-left" style="z-index:0;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
    <?php if ($access == 3 || $access == 4): ?>
    <a href="index.php?page=user" class="w3-bar-item w3-button w3-padding <?= ($page == 'user' ) ? "w3-blue" : "" ?>"><i class="fa fa-eye fa-fw"></i>&nbsp; Overview</a>
    <a href="index.php?page=patients" class="w3-bar-item w3-button w3-padding <?= ($page == 'patients' ) ? "w3-blue" : "" ?>"><i class="fa fa-users fa-fw"></i>&nbsp; Patients</a>
    <?php endif;?>
    <?php if ($access == 3 || $access == 2 || $access == 4): ?>
    <a href="index.php?page=calendar" class="w3-bar-item w3-button w3-padding <?= ($page == 'calendar' ) ? "w3-blue" : "" ?>"><i class="fa fa-calendar fa-fw"></i>&nbsp; Calendar</a>
    <a href="index.php?page=messages" class="w3-bar-item w3-button w3-padding <?= ($page == 'messages' ) ? "w3-blue" : "" ?>"><i class="fa fa-envelope fa-fw"></i>&nbsp; Messages</a>
    <?php endif;?>
    <?php if ($access == 1 || $access == 4): ?>
    <a href="index.php?page=record" class="w3-bar-item w3-button w3-padding <?= ($page == 'record' ) ? "w3-blue" : "" ?>"><i class="fa fa-heartbeat fa-fw"></i>&nbsp; Medical Record</a>
    <a href="index.php?page=appointment" class="w3-bar-item w3-button w3-padding <?= ($page == 'appointment' ) ? "w3-blue" : "" ?>"><i class="fa fa-thumb-tack fa-fw"></i>&nbsp; Appointment</a>
    <?php endif;?>
    <?php if ($access > 0): ?>
    <a href="index.php?page=logout" class="w3-bar-item w3-button w3-padding <?= ($page == 'setting' ) ? "w3-blue" : "" ?>"><i class="fa fa-sign-out fa-fw"></i>&nbsp; Logout</a><br><br>
    <?php endif;?>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:51px;">