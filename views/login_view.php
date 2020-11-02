<?php include_once 'includes/header.php' ?>
<?php include_once 'includes/navbar.php' ?>

<div class="login-page">
  <div class="form">
    <form class="register-form" method="post">
      <input name="name" type="text" placeholder="name" required/>
      <input name="confirmPsw" type="password" placeholder="password" required/>
      <input name="email" type="text" placeholder="email address" required/>
      <button name="submitForm" type="submit">create</button>
      <p class="message">Already registered? <a href="">Sign In</a></p>
    </form>
    <form class="login-form" method="post">
      <input name="uname" type="text" placeholder="username" required autofocus/>
      <input name="psw" type="password" placeholder="password" required/>
      <button name="submit" type="submit">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>

<?php include_once 'includes/footer.php' ?>