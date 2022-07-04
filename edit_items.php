<?php
include 'connect.php';

$x=$_GET['editid'];
$sql="SELECT * FROM `item` where x='$x'";
$run=mysqli_query($con,$sql);
$values=mysqli_fetch_assoc($run);
$idx=$values['id'];
$itemx=$values['item'];
$pricex=$values['price'];
if(isset($_POST['save'])){
    $id=$_POST['itemid'];
    $item=strtoupper($_POST['itemname']);
    $price=$_POST['price'];

    $sql="UPDATE `item` set id='$id',item='$item',price='$price' where x='$x'";
    $run=mysqli_query($con,$sql);
    if($run){
        header ('location:add_items.php');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="hotel.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<body>
    <div class="outsidecontainer">
        <div class="nav">
            <ul>
                <li><a href="admin_home.php">HOME</a></li>
                <li><a href="add_waiter.php">ADD/EDIT WAITER</a></li>
                <li><a href="add_items.php" class="active">ADD/EDIT ITEMS</a></li>
                <li><a href="billing.php">BILLING</a></li>
            </ul>
        </div>
        <div class="maincontent">
        <div class="maincontent-trans">
            <form class="formcontainer editpages_col" method="post">
                <h2>Edit Item</h2>
                <div class="form-group">
                    <label for="itemid">Item Id</label>:
                    <input type="text" name="itemid" id="itemid" placeholder="Enter Item id" autocomplete="off" value="<?php echo $idx ?>">
                </div>
                <div class="form-group">
                    <label for="itemname">Item Name</label>:
                    <input type="text" name="itemname" id="itemname" placeholder="Enter Item name" autocomplete="off" value="<?php echo $itemx ?>">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>:
                    <input type="text" name="price" id="price" placeholder="Enter price" autocomplete="off" value="<?php echo $pricex ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn button-28" name="save">SAVE</button>
                    <button type="reset" onclick="location.href='add_items.php';" class="btn button-28 button-29" name="cancel">CANCEL</button>
                </div>
                <h2>Items</h2>
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
                            $id=$values['id'];
                            $name=$values['item'];
                            $price=$values['price'] ?>
                            <tr>
                                <td><?php echo $sino ?>
                                </td>
                                <td><?php echo $id ?>
                                </td>
                                <td><?php echo $name ?>
                                </td>
                                <td><?php echo $price ?></td>
                                <td class="pad4">
                                    <div class="tdbtn">
                                    <a href="edit_items.php?editid=<?php echo $id ?>" class="tablebtn btn-edit width60 gfg"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <!-- <button type="button" class="tablebtn btn-other width60"
                                            onclick="location.href='edit.php';">EDIT</button> -->
                                    </div>
                                    <div class="tdbtn">
                                    <a href="delete_items.php?deleteid=<?php echo $id ?>" class="tablebtn btn-delete width60 gfg "><i class="fa fa-trash" aria-hidden="true"></i></a>
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

</body>
</head>

</html>