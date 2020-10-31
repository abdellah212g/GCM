<?php include_once 'includes/header.php' ?>

<div class="w3-container w3-center" style="padding:128px 16px">
    <form enctype="multipart/form-data" method="post">
        <fieldset>
            <legend>Log-In</legend>
                <p>
                    <label>Login :</label>
                    <input name="login" type="text" />
                    <label>Password :</label>
                    <input name="password" type="password" />
                    <input type="submit" name="submit" value="Login" />
                </p>
        </fieldset>
    </form>
</div>

<?php include_once 'includes/footer.php' ?>