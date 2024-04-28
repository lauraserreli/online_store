<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <title>Online Store</title>
</head>


<body>
<div class="container">
    <div class="header clearfix">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>

                <?php
                if(!isset($_SESSION['Active'])){
                    echo "<li><a href=\"register.php\">Register</a></li>";
                }
                ?>


                <li><a href="about.php">About</a></li>
                <li><a href="contacts.php">Contact</a></li>
                <?php
                if(isset($_SESSION['Active'])){
                    echo "<li><a href=\"logout.php\">Logout</a></li>";
                } else {
                    echo "<li><a href=\"login.php\">Login</a></li>";
                }
                ?>
            </ul>
        </nav>
