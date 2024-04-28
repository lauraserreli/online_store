<?php
session_start();
require_once 'src/common.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <title>Sign in</title>
</head>

<?php
if(isset($_POST['Submit']))
{
    $user = register($_POST['Username'], $_POST['Password'], $_POST['Fullname']);

    echo 'You have registered on the application.';
}
?>

<body>
<div class="container">
    <form action="" method="post" name="Register_Form" class="form-signin">
        <h2 class="form-signin-heading">Please register</h2>
        <label for="inputUsername" >Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputFullname" >FullName</label>
        <input name="Fullname" type="username" id="inputFullname" class="form-control" placeholder="Fullname" required autofocus>
        <button name="Submit" value="Submit" class="button" type="submit">Register</button>
    </form>
</div>
</body>
</html>
