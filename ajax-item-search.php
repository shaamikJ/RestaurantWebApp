<?php
include 'connect.php';
if(isset($_POST["query"]))
{
    

    $data = array();

    $condition = preg_replace('/[^A-Za-z0-9\- ]/','',$_POST["query"]);
    // $condition = "piz";

    $query = "Select * from `item` where item like '%".$condition."%'";
    $result = $con->query($query);
    $replace_string = '<b>'.$condition.'</b>';
    foreach($result as $row)
    {
        $data[] = array(
            'item'      => str_ireplace($condition,$replace_string,$row["item"]),
            'orgitem'   => $row['item'],
            'item_id'   => $row['id'],
            'price'     => $row['price']

        );
    }
    echo json_encode($data);
}
?>