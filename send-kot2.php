<?php
include 'connect.php';
include_once('domparser/simple_html_dom.php');
$table = file_get_html('http://localhost/Restaurant/waiter/waiter_kot.php');
$i = 0;
foreach($table->find('tbody') as $tbody){
foreach($tbody->find('tr') as $tr)
{
    echo "Inside";
    echo $i;
    // if($i==0)
    // {
    //     $th1 = $tr->find('th', 1)->plaintext;
    //     $th2 = $tr->find('th', 2)->plaintext;
    //     echo $th1;
    //     echo $th2;
    // }
    // else{
    $tableno = $tr->find('td', 1)->plaintext;
    $itemname = $tr->find('td', 2)->plaintext;
    $quantity = $tr->find('td', 3)->plaintext;
    $price = $tr->find('td', 4)->plaintext;
    // $tableno_c = mysqli_real_escape_string($con,$tableno) ;
    // $itemname_c = mysqli_real_escape_string($con,$itemname) ;
    // $quantity_c = mysqli_real_escape_string($con,$quantity) ;
    // $price_c = mysqli_real_escape_string($con,$price) ;
    // echo $tableno_c."<br>";
    // echo $itemname_c."<br>";
    // echo $quantity_c."<br>";
    // echo $price."<br>";
    echo $tableno."<br>";
    echo $itemname."<br>";
    echo $quantity."<br>";
    echo $price."<br>";
    // }
    $i = $i + 1;

}
}


?>