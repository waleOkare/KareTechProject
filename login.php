<?php
session_start();
include ("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Username and password sent from form
    // To protect MySQL injection for Security purpose
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = md5(mysqli_real_escape_string($db,$_POST['password']));
    $username = stripslashes($username);
    $password = stripslashes($password);
    $_SESSION['login_user'] = htmlentities($_POST['username']);
    $sql = "SELECT uid
            FROM users
            WHERE username = '$username'
            and
            password = '$password'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);
    // If result matched $username and $password, table row must be 1 row
    if($count == 1) {
        //error check here...........
        $_SESSION['login_user'] = $username;
        echo $_SESSION['login_user'];
        header("location: Home.php");// Redirecting To another Page
    }else {

        header("location: index.php");
    }
}
mysqli_close($db);
