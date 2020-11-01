<?php include_once 'includes/header.php' ?>
<?php include_once 'includes/navbar.php' ?>

<div class="contact-page">
  <div class="contact-form">
    <form  enctype="multipart/form-data" method="post">
      <input name="fname" type="text" placeholder="First Name" required autofocus/>
      <input name="lname" type="text" placeholder="Last Name" required/>
      <input name="phone" type="tel" placeholder="Phone Number" pattern="[0-9]{10}" required/> 
      <textarea name="msg" type="text" placeholder="Your message" required></textarea>
      <button name="submit" type="submit">send</button>
    </form>
  </div>
</div>

<?php include_once 'includes/footer.php' ?>