<?php 
session_start();
$user = $_SESSION['user'];
if(isset($_POST['ItemName1']))
{
    $waiter = "Shaamik";
    $tablenumber = $_POST['Table1'];
}
?>
<html>
    <head>
        <title>KOT</title>
        <style>
            html,body{
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                width: 100%;
            }
            *,*::before,*::after{
                box-sizing: border-box;
            }
            .box1{
                width: 100%;
                display: flex;
                flex-direction: flex-start;
                justify-content: space-between;
                /* border: 1px solid red; */
                padding: 5px;
            }
            h1,h2,h3,h4,h5,h6{
                margin: 0px;
            }
            .tablecon{
                width: 100%;
            }
            table{
                border-collapse: collapse;

            }
            tr,td,th{
                border: 1px solid #333;
                
            }
            td{
                text-align: center;
            }

        </style>
    </head>
    <body>
    <div class="kotbill">
        <div class="box1">
            <h4>Date :<?php echo date("Y-m-d");?></h4>
            <h2>VSY FOOD COURT</h2>
            <h4>Time :<?php date_default_timezone_set('Asia/Kolkata');echo date('H:i');?></h4>
        </div>
        <div class="box1" style="align-items: center; justify-content: ">
            <!-- <h4 style="width: 150px;">Table : <?php echo $waiter;?></h5>
            <h4 style="margin-right: auto;">Waiter : <?php echo $tablenumber;?></h4>
            <h2 style="margin-right: auto; text-decoration: underline;">KOT</h2> -->
            <h4 >Table : <?php echo $tablenumber;?></h5>
            <h4 style="margin-right: auto; margin-left: 15px;">Waiter : <?php echo $user;?></h4>
            <h2 style="margin-right: auto; margin-left: -200px; text-decoration: underline;">KOT</h2>
        </div>
        <div class="tablecon">
        <table style="width: 100%;">
        
            <tr>
                <th>S.N</th>
                <th>PARTICULARS</th>
                <th>QTY</th>
            </tr>
        
<?php
include 'connect.php';
    if(isset($_POST['order'])){
        $rowc = $_POST['rowscount'];
        $cdate = date("Y-m-d");
        $waiterid = "Shaamik";
        for($i=1;$i<=$rowc;$i++){
            if(isset($_POST['ItemName'.$i]))
            {
                $sino = $_POST['Sino'.$i];
                $table = $_POST['Table'.$i];
                $iid = $_POST['ItemId'.$i];
                $iname = $_POST['ItemName'.$i];
                $iqty = $_POST['ItemQty'.$i];
                $iprice = $_POST['ItemPrice'.$i];
                
                $sql="INSERT into `kot` (date,waiterid,itemid,itemname,itemprice,itemqty,tableno,status) values ('$cdate','$waiterid','$iid','$iname','$iprice','$iqty','$table','0')";
                $run=mysqli_query($con, $sql);
                if($run)
                {
                    ?><tr>
                        <td><?php echo $sino ?></td>
                        <td><?php echo $iname ?></td>
                        <td><?php echo $iqty ?></td>
                    </tr>
                    <?php
                }
                else{
                    echo "Something wrong";
                }
            }
        }

    }
?>
        </table>
        </div>
        <h3 style="text-align: center;">This is not a bill</h3>
    </div>
</body>
</html>