<pre>
<?php
require_once("initialize.php");
print_r($_SESSION);

unset($_SESSION['username']);

session_destroy(); //remove All sessions
// or you could use
// $_SESSION['username'] = NULL;

//Send Back to login after logout
redirect_to('../index.php');
?></pre>
