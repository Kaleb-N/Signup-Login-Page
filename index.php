<?php 
    include('server.php');
    if(!isset($_SESSION['username'])){
        header('location: login.php');
    }
    // if(isset($_GET['logout'])){
    //     session_destroy();
    //     unset($_SESSION['username']);
    //     header('location: login.php');
    // }
    if(isset($_POST['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Welcome <?php echo $_SESSION['wow']?></p>
    <!-- <a href="index.php?logout='1'">Logout</a> -->
    <form action="index.php" method="post">
        <button name='logout'>Logout</button>
    </form>
    
</body>
</html>