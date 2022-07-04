<?php
include 'connect.php';
if(isset($_POST["tablequery"]))
{
    

    $data = array();

    $condition = preg_replace('/[^A-Za-z0-9\- ]/','',$_POST["tablequery"]);
    // $condition = 1;

    $query = "Select * from `kot` where tableno='".$condition."' and status=0";




    
    $result = $con->query($query);

    foreach($result as $row)
    {
        $data[] = array(
            'waiterid'   => $row['waiterid'],
            'itemid'     => $row['itemid'],
            'itemname'  => $row['itemname'],
            'itemprice' => $row['itemprice'],
            'itemqty'   => $row['itemqty'],
            'tablenumber'   => $row['tableno']
        );
    }
    echo json_encode($data);
}
?>