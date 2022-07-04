<?php
include 'connect.php';

$x=$_GET['editid'];
$spl="SELECT * FROM user where x='$x'";
$ran=mysqli_query($con, $spl);
$values=mysqli_fetch_assoc($ran);
$idx=$values['id'];
$namex=$values['name'];
$aadhaarx=$values['aadhaar'];
$addressx=$values['address'];
$cityx=$values['city'];
$contactx=$values['contact'];
$userx=$values['username'];
$passx=$values['password'];
if (isset($_POST['save'])) {
    $id=$_POST['waiterid'];
    $name=strtoupper($_POST['waitername']);
    $aadhaar=$_POST['aadhaar'];
    $address=$_POST['waiteradd'];
    $city=$_POST['waitercity'];
    $contact=$_POST['waitercontact'];
    $user=$_POST['username'];
    $pass=$_POST['password'];

    $sql="UPDATE `user` set id='$id',name='$name',aadhaar='$aadhaar',address='$address',city='$city',contact='$contact',username='$user',password='$pass' where x='$x'";
    $run=mysqli_query($con, $sql);
    if ($run) {
        header('location:add_waiter.php');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add/Edit Waiter</title>
    <link rel="stylesheet" href="hotel.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<body>
    <div class="outsidecontainer">
        <div class="nav">
            <ul>
                <li><a href="admin_home.php">HOME</a></li>
                <li><a href="add_waiter.php" class="active">ADD/EDIT WAITER</a></li>
                <li><a href="add_items.php">ADD/EDIT ITEMS</a></li>
                <li><a href="billing.php">BILLING</a></li>
            </ul>
        </div>
        <div class="maincontent">
        <div class="maincontent-trans">
            <form class="formcontainer editpages_col" method="post">

                <h2>EDIT WAITER</h2>
                <div class="form-group">
                    <label for="waiterid">Waiter Id</label>:
                    <input type="text" name="waiterid" id="waiterid" placeholder="Enter Waiter id" autocomplete="off"
                        value="<?php echo $idx ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="waitername">Waiter Name</label>:
                    <input type="text" name="waitername" id="waitername" placeholder="Enter Waiter name"
                        autocomplete="off"
                        value="<?php echo $namex ?>">
                </div>
                <div class="form-group">
                    <label for="aadhaar">Aadhaar</label>:
                    <input type="text" name="aadhaar" id="aadhaar" placeholder="Enter Aadhaar no" autocomplete="off"
                        value="<?php echo $aadhaarx ?>">
                </div>
                <div class="form-group">
                    <label for="waiteradd">Address</label>:
                    <input type="text" name="waiteradd" id="waiteradd" placeholder="Enter Address" autocomplete="off"
                        value="<?php echo $addressx ?>">
                </div>
                <div class="form-group">
                    <label for="waitercity">City</label>:
                    <input type="text" name="waitercity" id="waitercity" placeholder="Enter City" autocomplete="off"
                        value="<?php echo $cityx ?>">
                </div>
                <div class="form-group">
                    <label for="waitercontact">Contact</label>:
                    <input type="text" name="waitercontact" id="waitercontact" placeholder="Enter Contact no"
                        autocomplete="off"
                        value="<?php echo $contactx ?>">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>:
                    <input type="text" name="username" id="username" placeholder="Enter Username" autocomplete="off"
                        value="<?php echo $userx ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>:
                    <input type="password" name="password" id="password" placeholder="Enter Password" autocomplete="off"
                        value="<?php echo $passx ?>">
                    <span class="eye" onclick="myFunction()">
                        <i id="hide1" class="fa fa-eye"></i>
                        <i id="hide2" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn button-28" name="save">SAVE</button>
                    <button type="button" onclick="location.href='add_waiter.php';"
                        class="btn button-28 button-29">CANCEl</button>
                </div>

                <h2>WAITERS</h2>
                <div class="tablebox">
                    <table style='width:100% !important;'>
                        <colgroup>
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 40%;">
                            <col span="1" style="width: 30%;">
                        </colgroup>
                        <tr>
                            <th>SI.NO.</th>
                            <th>ID</th>
                            <th>NAME</th>
                            <th cellpadding=20%>Action</th>
                        </tr>
                        <?php
                        $sql="SELECT * FROM `user` where x<>1";
                        $run=mysqli_query($con, $sql);
                        $sino=1;
                        while ($values=mysqli_fetch_assoc($run)) {
                            $x=$values['x'];
                            $id=$values['id'];
                            $name=$values['name']; ?>
                        <tr>
                            <td><?php echo $sino ?>
                            </td>
                            <td><?php echo $id ?>
                            </td>
                            <td><?php echo $name ?>
                            </td>
                            <td class="pad4">
                                <div class="tdbtn">
                                    <a href="edit_waiter.php?editid=<?php echo $x ?>"
                                        class="tablebtn btn-edit width60 gfg"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <!-- <button type="button" class="tablebtn btn-other width60"
                                            onclick="location.href='edit.php?editid='.$id.'';">EDIT</button> -->
                                </div>
                                <div class="tdbtn">
                                    <a href="delete_waiter.php?deleteid=<?php echo $x ?>"
                                        class="tablebtn btn-delete width60 gfg"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <!-- <button type="button" class="tablebtn btn-danger width60"
                                            onclick="location.href='delete.php';">DELETE</button> -->
                                </div>
                            </td>
                        </tr>
                        <?php $sino=$sino+1;
                        }
                        ?>
                </div>
            </form>
        </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
</body>
</head>

</html>
