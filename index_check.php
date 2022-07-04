<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="Select * from `user` where id='admin'";
    $run=mysqli_query($con, $sql);
    $result=mysqli_fetch_assoc($run);
    $user=$result['username'];
    $pass=$result['password'];
    
    if ($username==$user and $password==$pass) {
        header('location:admin_home.php');
    } else {
        $sql="Select * from `user` where username='$username' and 	password='$password' and id<>1";
        $run=mysqli_query($con, $sql);
        if ($run) {
            $num=mysqli_num_rows($run);
            if ($num>0) {
                $values = mysqli_fetch_assoc($run);
                $_SESSION['user'] = $values['username'];
                header('location:waiter/waiter_kot.php');
            } else {
                header('location:index.php');
            }
        }
    }
}
?>