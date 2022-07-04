<?php
include 'connect.php';

if (isset($_POST['add'])) {
    $id=$_POST['waiterid'];
    $name=strtoupper($_POST['waitername']);
    $aadhaar=$_POST['aadhaar'];
    $address=strtoupper($_POST['waiteradd']);
    $city=strtoupper($_POST['waitercity']);
    $contact=$_POST['waitercontact'];
    $user=$_POST['username'];
    $pass=$_POST['password'];

    $sql="INSERT INTO `user` (id,name,aadhaar,address,city,contact,username,password) VALUES ('$id','$name','$aadhaar','$address','$city','$contact','$user','$pass')";
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
    <div class="outside-out">
    
        <div class="nav">
            <ul>
                <li><a href="admin_home.php">HOME</a></li>
                <li><a href="#" class="active">ADD/EDIT WAITER</a></li>
                <li><a href="add_items.php">ADD/EDIT ITEMS</a></li>
                <li><a href="billing.php">BILLING</a></li>
            </ul>
        </div>
        <div class="maincontent">
        <div class="maincontent-trans">
            <form class="formcontainer" method="post">

                <h2>ADD WAITER</h2>
                <div class="form-group">
                    <label for="waiterid">Waiter Id</label>:
                    <input type="text" name="waiterid" id="waiterid" placeholder="Enter Waiter id" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="waitername">Waiter Name</label>:
                    <input type="text" name="waitername" id="waitername" placeholder="Enter Waiter name"
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="aadhaar">Aadhaar</label>:
                    <input type="text" name="aadhaar" id="aadhaar" placeholder="Enter Aadhaar no" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="waiteradd">Address</label>:
                    <input type="text" name="waiteradd" id="waiteradd" placeholder="Enter Address" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="waitercity">City</label>:
                    <input type="text" name="waitercity" id="waitercity" placeholder="Enter City" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="waitercontact">Contact</label>:
                    <input type="text" name="waitercontact" id="waitercontact" placeholder="Enter Contact no"
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>:
                    <input type="text" name="username" id="username" placeholder="Enter Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>:
                    <input type="password" name="password" id="password" placeholder="Enter Password"
                        autocomplete="off">
                    <span class="eye" onclick="myFunction()">
                        <i id="hide1" class="fa fa-eye"></i>
                        <i id="hide2" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn button-28" name="add">ADD</button>
                    <button type="reset" class="btn button-28 button-29" name="cancel">CANCEL</button>
                </div>

                <h2>EDIT WAITER</h2>
                <div class="tablebox">
                    <table style='width:100% !important;'>
                        <thead>
                            <colgroup>
                                <col span="1" style="width: 10%;">
                                <col span="1" style="width: 20%;">
                                <col span="1" style="width: 40%;">
                                <col span="1" style="width: 30%;">
                            </colgroup>
                            <tr>
                                <th>SI.NO.</th>
                                <th>ID</th>
                                <th>NAME</th>
                                <th cellpadding=20%>Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                            class="tablebtn btn-edit width60 gfg"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
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
                        </tbody>
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