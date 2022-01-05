<?php 
    session_start();

    $errors = array();

    $conn = mysqli_connect('localhost', 'root', '', 'khemsafe');

    // if(isset($_POST['login_user'])){
    //     $username = $_POST['username'];
    // $password = md5($_POST['password']);
    // $query = "SELECT * FROM students WHERE username='$username' OR email='$username' AND password='$password'";
    // $result = mysqli_query($conn, $query);

    // // new stuffs
    // $user = mysqli_fetch_assoc($result);
    // print_r($user);
    // $wow=$user['username'];
    // $_SESSION['wow'] = $wow;
    // echo $_SESSION['wow'];
    // }
    


    //registration script    
   if(isset($_POST['reg_user'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

        //form validation
        if(empty($username)){
            array_push($errors, "Username can't be empty");
        }
        if(empty($email)){
            array_push($errors, "Email can't be empty");
        }
        if(empty($password1)){
            array_push($errors, "Password can't be empty");
        }
        if($password1 != $password2){
            array_push($errors, 'Passwords do not match!!');
        }

        // check if user exist with the same username and email
        $check_query = "SELECT * FROM students WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($conn, $check_query);
        $user = mysqli_fetch_assoc($result);

        if($user){
            if($user['username'] == $username){
                array_push($errors,'Username already exists');
            }
            if($user['email'] == $email){
                array_push($errors, 'Email already exists');
            }
        }
        
        //register user
        if(count($errors) == 0){
            $password = md5($password1);
            $query = "INSERT INTO students (username, email, password) VALUES ('$username', '$email', '$password')";
            mysqli_query($conn, $query);
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            header('Location:index.php');
        }
    }
    
    
    //script to login user login user
    if(isset($_POST['login_user'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //login validation
        if(empty($username)){
            array_push($errors, 'Pls provide username');
        }
        if(empty($password)){
            array_push($errors, 'Pls provide password');
        }

        //login user
        if(count($errors) == 0){
            $password = md5($password);
            $query = "SELECT * FROM students WHERE username='$username' OR email='$username' AND password='$password'";
            $result = mysqli_query($conn, $query);
                $user = mysqli_fetch_assoc($result);
                $wow=$user['username'];
                $_SESSION['wow'] = $wow;
            if(mysqli_num_rows($result) == 1){
                
                $_SESSION['username'] = $username;
                header('location: index.php');
            }else{
                array_push($errors, 'Login details does not exist');
            }

        } 
    }

    //recover password
    if(isset($_POST['change_pass'])){
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $query = "SELECT email FROM students WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_num_rows($result);
        
        if(empty($email)){
            array_push($errors, "Email can't be empty" );
        }else if($user <= 0){
            array_push($errors,"User does not exist");
        }

        //script to change the password
        if($user == 1){
            $password = md5($password);
            $query = "UPDATE students SET password='$password' WHERE email='$email'";
            $result = mysqli_query($conn, $query);
            array_push($errors, 'Password reset successful');
            header('location: login.php');
        }

    }
    
    

?>
 
