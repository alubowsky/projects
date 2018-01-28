<?php 
    include_once 'models/Cart.php';
    $cart = Cart::getInstance();
    if(isset($_GET["item"])) {
        if(is_numeric(($_GET["item"]))){
            $item = $_GET["item"];
            $cart -> removeItem($item);
            header("Location: index.php?action=viewCart");
        }
    } else {
        die("No item to remove!");
    }
?>