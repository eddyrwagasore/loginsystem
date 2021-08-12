<?php 
require_once("assets/initialize.php");
require_once("header.php");


?>

<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box}

    /* Full-width input fields */
    input[type=text], input[type=password] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 5px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }

    hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }

    /* Set a style for all buttons */
    button {
    background-color: #2492aa;
    color: white;
    padding: 14px 20px;
    margin: 1px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }

    button:hover {
    opacity:1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
    padding: 14px 20px;
    background-color: #50aa56;
    }

    /* Float cancel and signup buttons and add an equal width */
    .cancelbtn, .signupbtn {
    float: left;
    width: 50%;
    }

    form{
        width: 500px;
    margin:0px auto;
    }
    /* Add padding to container elements */
    .container {
    padding: 2px 15px;
    }

    /* Clear floats */
    .clearfix::after {
    content: "";
    clear: both;
    display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
        width: 100%;
    }
    }
</style>
<body>
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
        <a href="index.php"><button type="button" class="cancelbtn">Login</button></a>
        <button type="submit" class="signupbtn">Sign In</button>
    </div>
  </div>
</form>
<script>
 
</script>


</body>
</html>
