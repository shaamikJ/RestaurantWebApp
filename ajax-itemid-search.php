<?php
include 'connect.php';
if(isset($_POST["query2"]))
{
    

    $data = array();

    $condition = preg_replace('/[^A-Za-z0-9\- ]/','',$_POST["query2"]);
    // $condition = "a2";

    $query = "Select * from `item` where id='".$condition."'";
    $result = $con->query($query);

    foreach($result as $row)
    {
        $data[] = array(
            'itemname'   => $row['item'],
            'price'     => $row['price']
        );
    }
    echo json_encode($data);
}
?>