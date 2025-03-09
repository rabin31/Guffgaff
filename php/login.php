<?php 
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($email) && !empty($password)){
    // Check if admin credentials are entered
    if($email === "guffgaff@admin.com" && $password === "guffgaff123"){
        $_SESSION['admin_logged_in'] = true;
        header("location: ../admin/index.php");
        exit;
    }
    
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $stored_pass = $row['password'];

        // If the password in the database is hashed with MD5 (legacy hashing), use MD5 to check
        if (strlen($stored_pass) == 32) {
            // The stored password is MD5, so verify it with MD5
            $user_pass = md5($password);
            if ($user_pass === $stored_pass) {
                // Update the password with a new hash (password_hash)
                $new_hashed_pass = password_hash($password, PASSWORD_BCRYPT);
                $update_sql = mysqli_query($conn, "UPDATE users SET password = '{$new_hashed_pass}' WHERE unique_id = {$row['unique_id']}");
                
                if ($update_sql) {
                    $_SESSION['unique_id'] = $row['unique_id'];
                    header("location: ../users.php");
                    $_SESSION['alertSuccess'] = "You just Logged In (Password updated)";
                } else {
                    header("location: ../Auth/auth.php?auth=login");
                    $_SESSION['alertError'] = "Something went wrong. Please try again!";
                }
            } else {
                header("location: ../Auth/auth.php?auth=login");
                $_SESSION['alertError'] = "Email or Password is Incorrect!";
            }
        } else {
            // The stored password is hashed with password_hash(), use password_verify()
            if (password_verify($password, $stored_pass)) {
                $_SESSION['unique_id'] = $row['unique_id'];
                header("location: ../users.php");
                $_SESSION['alertSuccess'] = "You just Logged In";
            } else {
                header("location: ../Auth/auth.php?auth=login");
                $_SESSION['alertError'] = "Email or Password is Incorrect!";
            }
        }
    } else {
        header("location: ../Auth/auth.php?auth=login");
        $_SESSION['alertError'] = "$email - This email does not exist!";
    }
}else{
    header("location: ../Auth/auth.php?auth=login");
    $_SESSION['alertError'] = "All input fields are required!";
}
?>
