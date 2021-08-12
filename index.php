<?php
require_once("assets/initialize.php");
require_once("header.php");


?>

<style>
    /* Bordered form */
    form {
        width: 500px;
        margin: 0px auto;
        border: 3px solid #f1f1f1;
        }

        /* Full-width inputs */
        input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
         box-sizing: border-box;
    }

        /* Set a style for all buttons */
        button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
        opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
        }

        /* Center the avatar image inside this container */
        .imgcontainer {
            width: 200px;
            border: 1px solid;
        height: 200px;
            overflow: hidden;
        text-align: center;
        margin: 0px auto;
            border-radius: 50%;
        }

        /* Avatar image */
        img.avatar {
            width: 200px;
            padding-top: 10px;
        }

        /* Add padding to containers */
        .container {
        padding: 16px;
        }


        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {

        .cancelbtn {
            width: 100%;
        }
        } 
    </style>

<body>
    <?php 
echo display_session_authErrors();
echo display_session_message();
?>
    <form method="POST" action="assets/auth.php" method="post">
    <div class="imgcontainer">
        <img src="assets/images/theo.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
        <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
        <a href="register.php"><span style="float: right;">Register</span></a>
        </label>
    </div>


    </form> 
</body>
</html>