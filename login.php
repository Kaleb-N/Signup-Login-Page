<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login | Page</title>
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>
    <form action="login.php" method="post">
        <!-- <?php include('errors.php')?> -->
        <div class="input-group">
            <label>Username or Email</label>
            <input type="text" name="username" autocomplete="off">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button class="btn" name="login_user">Login</button>
        </div>
        <p>
            Don't have an account yet <a href="signup.php">Register</a>
        </p>
        <p>
            Forgot password? <a href="forget_pass.php">click here</a>
        </p>
    </form>
</body>
</html>