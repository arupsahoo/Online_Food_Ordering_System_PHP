<?php
if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) )
{
    $_SESSION['login-check'] = "<div class='error text-center'>Please Log in to order food</div>";
    header('location: log-in.php');
    exit;
}

?>