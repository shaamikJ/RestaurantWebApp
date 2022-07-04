<?php

$con=mysqli_connect('localhost', 'root', '', 'restaurant');
if (!$con) {
    die(mysqli_error($con));
}
?>