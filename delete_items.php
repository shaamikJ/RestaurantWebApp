<?php
include 'connect.php';

$x=$_GET['deleteid'];
$sql="DELETE from `item` where x='$x'";
$run=mysqli_query($con,$sql);
if ($run) {
    header('location:add_items.php');
}
?>