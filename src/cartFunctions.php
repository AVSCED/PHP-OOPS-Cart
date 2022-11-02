<?php

namespace cartCRUD;

session_start();

//Class of products present in the cart
class productCart
{
    //Method to add product into the cart
    function addProduct($prod_Id)
    {
        include './productData.php';
        $flag = 0;
        if (empty($_SESSION['cart_Array'])) {
            //To add product when cart is empty
            foreach ($products as $key1 => $value1) {
                if ($value1['id'] == $prod_Id) {
                    $cartObj = array(
                        "id" => $value1['id'],
                        "name" => $value1['name'], "image" => $value1['image'],
                        "price" => $value1['price'], "quantity" => 1
                    );
                    array_push($_SESSION['cart_Array'], $cartObj);
                };
            }
        } else {
            //To check if the add product is already present in the cart
            foreach ($_SESSION['cart_Array'] as $key1 => $value1) {
                if ($value1['id'] == $prod_Id) {
                    $flag = 1;
                }
            }
            if ($flag == 1) {
                $i = 0;
                //to increase quantity of the product already present in the cart when added again from the product list
                foreach ($_SESSION['cart_Array'] as $key1 => $value1) {
                    if ($value1['id'] == $prod_Id) {
                        $_SESSION['cart_Array'][$i]['quantity'] = $_SESSION['cart_Array'][$i]['quantity'] + 1;
                    }
                    $i = $i + 1;
                }
            }
            // If product added isn't present , the add it at new index
            if ($flag == 0) {
                foreach ($products as $key1 => $value1) {
                    if ($value1['id'] == $prod_Id) {
                        $cartObj = array(
                            "id" => $value1['id'],
                            "name" => $value1['name'], "image" => $value1['image'],
                            "price" => $value1['price'], "quantity" => 1
                        );
                        array_push($_SESSION['cart_Array'], $cartObj);
                    }
                }
            }
        }
        echo json_encode($_SESSION['cart_Array']);
    }
    //Method to increase the quantity of the product
    function inreaseQuantity($increaseQuantitiyAtIndex)
    {

        $i = 0;
        foreach ($_SESSION['cart_Array'] as $key1 => $value1) {
            if ($value1['id'] == $increaseQuantitiyAtIndex) {
                $_SESSION['cart_Array'][$i]['quantity'] = $_SESSION['cart_Array'][$i]['quantity'] + 1;
            }
            $i = $i + 1;
        }
        echo json_encode($_SESSION['cart_Array']);
    }
    // Method to reduce the quantity of the product 
    function decreaseQuantity($reduceQuantitiyAtIndex)
    {
        $ind = 0;
        $i = 0;
        foreach ($_SESSION['cart_Array'] as $key1 => $value1) {
            if ($value1['id'] == $reduceQuantitiyAtIndex) {
                if ($_SESSION['cart_Array'][$i]['quantity'] > 1) {
                    $_SESSION['cart_Array'][$i]['quantity'] = $_SESSION['cart_Array'][$i]['quantity'] - 1;
                } else {
                    array_splice($_SESSION['cart_Array'], $i, 1);
                }
            }
            $i = $i + 1;
        }
        echo json_encode($_SESSION['cart_Array']);
    }
    //Method to calculate the cart bill
    function billAmount($bill_data)
    {
        $bill = 0;
        $z = 0;
        foreach ($_SESSION['cart_Array'] as $key1 => $value1) {
            $bill = $bill + $_SESSION['cart_Array'][$z]['price'] * $_SESSION['cart_Array'][$z]['quantity'];
            $z++;
        }
        echo $bill;
    }
    //Method to delete a product category from the cart array
    function deleteProduct($r)
    {
        $t = 0;
        foreach ($_SESSION['cart_Array'] as $key1 => $value1) {
            if ($value1['id'] == $r) {
                array_splice($_SESSION['cart_Array'], $t, 1);
            }
            $t++;
        }
        echo json_encode($_SESSION['cart_Array']);
    }
    //Method to empty the entire cart
    function emptyCart()
    {
        $_SESSION['cart_Array'] = [];
        echo json_encode($_SESSION['cart_Array']);
    }
}
