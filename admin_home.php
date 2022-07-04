<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>AdminHome</title>
    <link rel="stylesheet" href="hotel.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<body>
    <div class="outside-out">
        <div class="nav">
            <ul>
                <li><a href="#" class="active">HOME</a></li>
                <li><a href="add_waiter.php">ADD/EDIT WAITER</a></li>
                <li><a href="add_items.php">ADD/EDIT ITEMS</a></li>
                <li><a href="billing.php">BILLING</a></li>
            </ul>
        </div>
        <div class="maincontainerhome" style="height: 86vh;">
            <div class="h1box">
                <h1>VSYN FOOD COURT</h1>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">ADMIN</button>
            <div class="dropdown-content">
                <a href="settings.php">SETTINGS</a>
                <a href="logout.php">LOGOUT</a>
            </div>
        </div>
    </div>

</body>
</head>

</html>