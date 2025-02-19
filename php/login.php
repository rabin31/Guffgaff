<?php 
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($email) && !empty($password)){
    // Check if admin credentials are entered
    if($email === "admin@gmail.com" && $password === "admin123"){
        $_SESSION['admin_logged_in'] = true;
        header("location: ../admin/index.php");
        exit;
    }
    
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($password);
        $enc_pass = $row['password'];
        if($user_pass === $enc_pass){
            $status = "Active now";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2){
                $_SESSION['unique_id'] = $row['unique_id'];
                header("location: ../users.php");
                $_SESSION['alertSuccess'] = "You just Logged In";
            }else{
                header("location: ../Auth/auth.php?auth=login");
                $_SESSION['alertError'] = "Something went wrong. Please try again!";
            }
        }else{
            header("location: ../Auth/auth.php?auth=login");
            $_SESSION['alertError'] = "Email or Password is Incorrect!";
        }
    }else{
        header("location: ../Auth/auth.php?auth=login");
        $_SESSION['alertError'] = "$email - This email does not exist!";
    }
}else{
    header("location: ../Auth/auth.php?auth=login");
    $_SESSION['alertError'] = "All input fields are required!";
}
?>
