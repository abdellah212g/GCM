<?php include_once 'includes/header.php' ?>
<?php include_once 'includes/navbar.php' ?>

<div class="login-page">
  <div class="form">
    <form class="register-form" enctype="multipart/form-data" method="post">
      <input name="name" type="text" placeholder="name"/>
      <input name="confirmPsw" type="password" placeholder="password"/>
      <input name="email" type="text" placeholder="email address"/>
      <button name="register" type="submit">create</button>
      <p class="message">Already registered? <a href="">Sign In</a></p>
    </form>
    <form class="login-form" enctype="multipart/form-data" method="post">
      <input name="uname" type="text" placeholder="username"/>
      <input name="psw" type="password" placeholder="password"/>
      <button name="submit" type="submit">login</button>
      <p class="message">Not registered? <a href="">Create an account</a></p>
    </form>
  </div>
</div>

<?php include_once 'includes/footer.php' ?>