<?php 
require("assets/initialize.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <script src="assets/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <script src="assets/jquery.min.js"></script>
    </head>
<body>
<div class="topnav" id="myTopnav">
    <a href="index.php" class="active">Home</a>
 
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
    <a href="reservation.php">Book</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
<img src="assets/images/bars-solid.svg" width="20">
    </a>
</div>
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>