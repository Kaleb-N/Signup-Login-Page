<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Password Recovery</title>
</head>
<body>
    <div class="header">
        <h2>Recover Password</h2>
    </div>
    <form action="forget_pass.php" method="post">
        <?php include('errors.php')?>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" autocomplete="off">
        </div>
        <div class="input-group">
            <label>Enter new password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button class="btn" name="change_pass">Change Password</button>
        </div>
        <a href="login.php">Login</a>
    </form>
</body>
</html>