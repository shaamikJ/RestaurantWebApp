<?php
include 'connect.php';

if (isset($_POST['add'])) {
    $id=$_POST['itemid'];
    $item=strtoupper($_POST['itemname']);
    $price=$_POST['price'];

    $sql="INSERT into `item` (id,item,price) values ('$id','$item','$price')";
    $run=mysqli_query($con, $sql);
    if ($run) {
        header('location:add_items.php');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add/Edit Item</title>
    <link rel="stylesheet" href="hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<body>
    <div class="outside-out">
        <div class="nav">
            <ul>
                <li><a href="admin_home.php">HOME</a></li>
                <li><a href="add_waiter.php">ADD/EDIT WAITER</a></li>
                <li><a href="#" class="active">ADD/EDIT ITEMS</a></li>
                <li><a href="billing.php">BILLING</a></li>
            </ul>
        </div>
        <div class="maincontent">
            <div class="maincontent-trans">
            <form class="formcontainer" method="post">
                <h2>Add Items</h2>
                <div class="form-group">
                    <label for="itemid">Item Id</label>:
                    <input type="text" name="itemid" id="itemid" placeholder="Enter Item id" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="itemname">Item Name</label>:
                    <input type="text" name="itemname" id="itemname" placeholder="Enter Item name" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>:
                    <input type="text" name="price" id="price" placeholder="Enter price" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn button-28" name="add">ADD</button>
                    <button type="reset" class="btn button-28 button-29" name="cancel">CANCEL</button>
                </div>
                <h2>Edit Items</h2>
                <div class="tablebox">
                    <table style='width:100% !important;'>
                        <colgroup>
                            <col span="1" style="width: 7%;">
                            <col span="1" style="width: 7%;">
                            <col span="1" style="width: 30%;">
                            <col span="1" style="width: 15%">
                            <col span="1" style="width: 31%;">
                        </colgroup>
                        <tr>
                            <th>SI.NO.</th>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th style="padding: .4rem">Action</th>
                        </tr>
                        <?php
                        $sql="SELECT * FROM `item`";
                        $run=mysqli_query($con, $sql);
                        $sino=1;
                        while ($values=mysqli_fetch_assoc($run)) {
                            $x=$values['x'];
                            $id=$values['id'];
                            $name=$values['item'];
                            $price=$values['price'] ?>
                        <tr>
                            <td><?php echo $sino ?>
                            </td>
                            <td><?php echo $id ?>
                            </td>
                            <td class="t-align"><?php echo $name ?>
                            </td>
                            <td><?php echo $price ?>
                            </td>
                            <td class="pad4">
                                <div class="tdbtn">
                                    <a href="edit_items.php?editid=<?php echo $x ?>"
                                        class="tablebtn btn-edit width60 gfg"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                                </div>
                                <div class="tdbtn">
                                    <a href="delete_items.php?deleteid=<?php echo $x ?>"
                                        class="tablebtn btn-delete width60 gfg"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

</body>
</head>

</html>