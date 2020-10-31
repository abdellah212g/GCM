<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form enctype="multipart/form-data" action="../controllers/login_controller.php" method="post">
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
</body>
</html>