<?php
 ob_start(); // output buffering is turned on

 session_start(); // turn on sessions

 
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "loginsystem");

//Creating and Confirming Database Connection
function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    //Confirm Database Connection
    if(mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
    // Return True The Connection If it Succeeded
    return $connection;
  }

  $db = db_connect();
$errors = [];

function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }
// Performs all actions necessary to log in an admin
function log_in_admin($admin) {
    // Regenerating the ID protects the admin from session fixation.
      session_regenerate_id();
      $_SESSION['id'] = $admin['id'];
      $_SESSION['last_login'] = time();
      $_SESSION['username'] = $admin['username'];
      $_SESSION['email'] = $admin['email'];
      return true;
    }
  
    // is_logged_in() contains all the logic for determining if a
    // request should be considered a "logged in" request or not.
    // It is the core of require_login() but it can also be called
    // on its own in other contexts (e.g. display one link if an admin
    // is logged in and display another link if they are not)
    function is_logged_in() {
      // Having a admin_id in the session serves a dual-purpose:
      // - Its presence indicates the admin is logged in.
      // - Its value tells which admin for looking up their record.
      return isset($_SESSION['user_id']);
    }
  
    // Call require_login() at the top of any page which needs to
    // require a valid login before granting acccess to the page.
    function require_login() {
      if(!is_logged_in()) {
        redirect_to('index.php');
      } else {
        // Do nothing, let the rest of the page proceed
      }
    }
  
  
    function find_all_admins() {
      global $db;
  
      $sql = "SELECT * from users ";
      $sql .= "ORDER BY last_name ASC, first_name ASC";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      return $result;
    }

    function  find_user_by_username($username) {
        global $db;
        $sql = "SELECT * from users ";
        $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $data = mysqli_fetch_assoc($result); // find first
        mysqli_free_result($result);
        return $data; // returns an assoc. array
      }


//Custom Sweetalert For Displaying Authenticarion erros 
function sweetalerterr($msg,$text){
    $val="<script>
     Swal.fire({
        position: 'top-end',
        icon: 'error',
        showCloseButton: true,
        timer: 8000,";
        $val.="title: '{$text}',";
        $val.='
        html:"<ul class=\"text-danger\">';
        foreach($msg as $error){$val .= "<li>" . htmlspecialchars($error) . "</li>";};
        $val.='</ul>"';
            $val.="})</script>";
        return $val;
}
function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
        $output=sweetalerterr($errors,"Please Fix The Following");
  }
  return $output;
}


function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }
  


function display_session_message() {
    // Check if there is a session message and if there is a message in it
    // If there is , then what it will do , it's remove the session and put the message
    if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
        $msg = $_SESSION['message'];
        unset($_SESSION['message']);
        if(!is_blank($msg)) {
            $val="<script>
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
          })
          Toast.fire({
          icon: 'success',
          title: '".htmlspecialchars($msg)."'
          })
            </script>";
            return $val;
        }
    }
  }

  function display_session_authErrors() {
    // Check if there is a session message and if there is a message in it
    // If there is , then what it will do , it's remove the session and put the message
    if(isset($_SESSION['authErrors']) && $_SESSION['authErrors'] != '') {
        $msg = $_SESSION['authErrors'];
        unset($_SESSION['authErrors']);
        if($msg) {
            $val=sweetalerterr($msg,"Error Trying To login");
            return  $val;
        }
    }
  }











  function redirect_to($location) {
    header("Location: " . $location);
    exit;
  }

  function db_disconnect($connection) {
  //If There is A Connection Then Close it
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function db_escape($connection, $string) {
    //Escape data To be Inputted In A Database
    return mysqli_real_escape_string($connection, $string);
  }

// Check if the Query Did Execute Correctly
  function confirm_result_set($result_set) {
   //If there was no Result Set Then
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }


  // has_presence('abcd')
  // * validate data presence
  // * reverse of is_blank()
  // * I prefer validation names with "has_"
  function has_presence($value) {
    return !is_blank($value);
  }

  // has_length_greater_than('abcd', 3)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }
    function has_length_less_than($value, $max) {
        $length = strlen($value);
        return $length < $max;
    }
    function has_length_exactly($value, $exact) {
        $length = strlen($value);
        return $length == $exact;
    }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  // * validate string length
  // * combines functions_greater_than, _less_than, _exactly
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }


    function has_unique_username($username, $current_id="0") {
        global $db;
        //select a username with same username and where id is nont 0,for extra security
        $sql = "SELECT * from users ";
        $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
        $sql .= "AND id != '" . db_escape($db, $current_id) . "'";
        //execute the query
        // Select the number of returned row and then keep the status in a variable
        //free the result since we are done with them
        $result = mysqli_query($db, $sql);
        $admin_count = mysqli_num_rows($result);
        mysqli_free_result($result);
        return $admin_count === 0;
    }

  function validate_admin($admin,$option=[]) {
    // We added added a parameter to change the behavior of our validation
    // if the password was sent with option of false then , then password is not require
    $password_required=$option['password_required'] ?? true;
    $errors= [];
    //Validate Form Name
    if(is_blank($admin['first_name'])) {// Check if it's empty first
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }

    // Validata Form Last Name
    if(is_blank($admin['last_name'])) {// Check if it's empty first
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    //Validate if an email is valid
    if(is_blank($admin['email'])) {// Check if it's empty first
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($admin['email'], array('max' => 255))) {
      $errors[] = "Email name must be less than 255 characters.";
    } elseif (!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    //validate username
    if(is_blank($admin['username'])) { // Check if it's empty first
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($admin['username'], array('min' => 5, 'max' => 255))) {
      $errors[] = "Username must be between 5 and 255 characters.";
    } elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
      $errors[] = "Username not allowed. Try another.";
    }


    // validate passwords
    if($password_required){
    if(is_blank($admin['password'])) {// Check if it's empty first
      $errors[] = "Password cannot be blank.";
    } elseif (!has_length($admin['password'], array('min' => 8))) {
      $errors[] = "Password must contain 8 or more characters";
    } elseif (!preg_match('/[A-Z]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 uppercase letter";
    } elseif (!preg_match('/[a-z]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 lowercase letter";
    } elseif (!preg_match('/[0-9]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 number";
    } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 symbol";
    }

    if(is_blank($admin['confirm_password'])) {
      $errors[] = "Confirm password cannot be blank.";
    } elseif ($admin['password'] !== $admin['confirm_password']) {
      $errors[] = "Password and confirm password must match.";
    }}


  

    return $errors;
  }




  function insert_admin($admin) {
    global $db;

    $errors = validate_admin($admin);
    if (!empty($errors)) {
      return $errors;
      // if all forms has no error then data can proceeed
    }

    // Encrypting the password for the user so that nobody can see shit
    $hashed_password = md5($admin['password']);
    // db_escape simply uses mysl_real_escapre_string on all outside data
    $sql = "INSERT INTO users ";
    $sql .= "(first_name, last_name, username, email, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['username']) . "',";
    $sql .= "'" . db_escape($db, $admin['email']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
        if($result){
            // If Data was inserted correctly in the database
            return true;
        }
     
     else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}




?>
