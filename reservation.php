<?php 
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
    width: 100%;
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
        $admin['email'] = $_POST['email'] ?? '';
        $admin['phone'] = $_POST['phone'] ?? '';
        $admin['date'] = $_POST['date'] ?? '';
        $admin['session'] = $_POST['session'] ?? '';
    
        if(empty($errors)){
            $result = makereservation($admin);//return all the errors if it does not work
         
            if($result === true) {
            $new_id = mysqli_insert_id($db);
            $_SESSION['message'] = $admin['first_name'].' Your Reservation Was Made Successfully';
            redirect_to("index.php");
        } else {
            $errors = $result;
            echo display_errors($errors);
        }
        
    }
    
    }
    
?>
<section class="container-fluid bgreserve">
<form method="POST" action="reservation.php" style="background-color:rgba(255,255,255,.1); border:1px solid #ccc">
  <div class="container">
    <h2>Reserve A place </h2>
    <p>Please fill in this form to Book your seat.</p>
    <hr>

    <label for="email"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="firstname"  required>
    <label for="email"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lastname"  required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email"  required><br>
    
   
    <label for="email"><b>Phone</b></label>
    <input type="text" placeholder="Enter Email" name="phone"  required>

    <br><br><label for="email"><b>Date</b></label>
    <input type="date" placeholder="Enter Email" name="date"  required>
    
    <label for="Session"><b>Session</b></label>
    <select class="form-select" name='session' aria-label="Disabled select example" id="session">
        <option selected>Select Session</option>
        <option value="1">06H:30 - 9H:30</option>
        <option value="2">10H:00 - 12H:30</option>
        <option value="3">13H:00 - 16H:00</option>
    </select>
    <br>
    <br>

 

    <div class="clearfix">
        <button type="submit" class="signupbtn">Book</button>
    </div>
  </div>
</form>
</section>


</body>
</html>
