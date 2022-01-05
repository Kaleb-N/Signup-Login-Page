<?php include('server.php') ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registration | Page</title>
</head>
<body>
    <div class="header">
        <h3>Register</h3>
    </div>
    <form action="signup.php" method="post">
        <?php include('errors.php')?> 
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" autocomplete="off">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" autocomplete="off">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" >
        </div>
        <div class="input-group">
            <label>Re-enter Password</label>
            <input type="password" name="password2">
        </div>
        <button class="btn" name="reg_user">Sign Up</button>
        <p>Already a member <a href="login.php">Login</a></p>
    </form>
</body>
</html>