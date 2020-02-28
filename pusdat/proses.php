<?php
include "controller/controller.php";
$main = new controller();
session_start();
if($_POST['login'])
{
    $_SESSION['user'] = "admin";
    if($_SESSION['user'])
    {
        $main->index();
    }
}
header("location:index.php");
?>