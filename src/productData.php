<?php
$products = array(
    array( "id"=> 101, "name"=> "Basket Ball", "image"=> "basketball.png", "price"=> 150 ),
    array( "id"=> 102, "name"=> "Football", "image"=> "football.png", "price"=> 120 ),
    array( "id"=> 103, "name"=> "Soccer", "image"=> "soccer.png", "price"=> 110 ),
    array( "id"=> 104, "name"=> "Table Tennis", "image"=> "table-tennis.png", "price"=> 130 ),
    array( "id"=> 105, "name"=> "Tennis", "image"=> "tennis.png", "price"=> 100 )
);
if (!isset($_SESSION['cart_Array'])){
    $_SESSION['cart_Array']=[];
}
?>