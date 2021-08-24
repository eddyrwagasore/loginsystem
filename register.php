<?php 
require_once("header.php");


?>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $admin['first_name'] = $_POST['firstname'] ?? '';
        $admin['last_name'] = $_POST['lastname'] ?? '';
        $admin['username'] = $_POST['username'] ?? '';
        $admin['email'] = $_POST['email'] ?? '';
        $admin['password'] = $_POST['password'] ?? '';
        $admin['confirm_password'] = $_POST['confirm_password'] ?? '';
    
        if(empty($errors)){
            $result = insert_admin($admin);//return all the errors if it does not work
          
            if($result === true) {
            $new_id = mysqli_insert_id($db);
            $_SESSION['message'] = $admin['username'].' Your Account Successfully Created';
            redirect_to("index.php");
        } else {
            $errors = $result;
            echo display_errors($errors);
        }
        
    }
    
    }
    
?>
<form method="POST" action="register.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="firstname" value="<?php echo $_POST['firstname'] ?? "";?>" required>
    <label for="email"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lastname" value="<?php echo $_POST['lastname'] ?? "";?>" required>
    <label for="email"><b>username</b></label>
    <input type="text" placeholder="Enter Username" name="username" value="<?php echo $_POST['username'] ?? "";?>" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $_POST['email'] ?? "";?>" required>

    <label for="psw"><b>password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="confirm_password" required>
    <div class="clearfix">
        <a href="login.php"><button type="button" class="cancelbtn">Login</button></a>
        <button type="submit" class="signupbtn">Sign In</button>
    </div>
  </div>
</form>
<script>
 
</script>


</body>
</html>
