<?php 
require_once("initialize.php");

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$errors=[];
if(is_blank($username)) {
  $errors[] = "Username cannot be blank.";
}
if(is_blank($password)) {
  $errors[] = "Password cannot be blank.";
}

if(!empty($errors)) {
    $_SESSION['authErrors'] = $errors;
    redirect_to('index.php');
    return;
}

// if there were no errors, try to login
if(empty($errors)) {
// Using one variable ensures that msg is the same
$login_failure_msg = "Unknown Username or Password";
//return an associative array with the user Data

$admin = find_user_by_username($username); 
if($admin) {
    //check if the password from form match with the encrypted password
    if(password_verify($password, $admin['hashed_password'])) {
        // password matches
        //create Sessions to Login
        log_in_admin($admin);
        //send to the login page
        redirect_to('home.php');
    }else{
        //Username Correct But not password
        $errors[] = $login_failure_msg;
        $result_array =$errors;
    $_SESSION['authErrors'] = $result_array;
    redirect_to('../login.php');
    }
} else{
    // no username found
    $errors[] = $login_failure_msg;
    $result_array =$errors;
    $_SESSION['authErrors'] = $result_array;
    redirect_to('../login.php');
    }
  
}


