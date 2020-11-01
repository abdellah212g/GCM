<!-- Navbar -->
<!-- <div style="padding: 25px"></div> -->
<nav class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="<?= "index.php?page=home" ?>" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="<?= "index.php?page=services" ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Services</a>
    <a href="<?= "index.php?page=about" ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
    <a href="<?= "index.php?page=contact" ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact</a>
    <a href="<?= "index.php?page=login" ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-right"><?= (empty($username)) ? 'Login' : $username ?></a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="<?= "index.php?page=services" ?>" class="w3-bar-item w3-button w3-padding-large">Services</a>
    <a href="<?= "index.php?page=about" ?>" class="w3-bar-item w3-button w3-padding-large">About</a>
    <a href="<?= "index.php?page=contact" ?>" class="w3-bar-item w3-button w3-padding-large">Contact</a>
    <a href="<?= "index.php?page=login" ?>" class="w3-bar-item w3-button w3-padding-large">Login</a>
  </div>
</nav>