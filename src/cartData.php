<?php 
require_once './cartFunctions.php'; 

$obj=new cartCRUD\productCart; 

// To add product in the cart 
$action =$_POST['action'];

if ($action == "add_to_cart"){

$prod_Id = $_POST['ind'];
$obj-> addProduct($prod_Id);

}

// To increase Quantity in the cart and send the updated data through ajax
if ($action == "add_Quant"){

    $addQuantitiyIndex= $_POST['addQuantIndex'];
    $obj->inreaseQuantity($addQuantitiyIndex);
}

//To decrease Quantity in the cart and send the updated data through ajax
if ($action == "reduce_Quant"){

    $reduceQuantityIndex= $_POST['reduceQuantIndex'];
    $obj->decreaseQuantity($reduceQuantityIndex);
} 

//To calculate the bill of products in the cart and send the updated data through ajax
if ($action == "bill_Amount"){

    $bill_data = $_POST['billData'];
    $obj->billAmount($bill_data);

}

//To delete the entire row
if ($action == "del_Row")
{
    
    $deleteProduct = $_POST['delId'];
    $obj->deleteProduct($deleteProduct);
}
// To empty the entire cart
if ($action == "empty_Cart"){
 
    $obj->emptyCart();
}
?>