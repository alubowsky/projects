<?php
    if(!empty($_POST["item"])) {
        $item = $_POST["item"];
    } else {
        die("No item to add!");
    }

    if(!empty($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
    } else {
        $quantity = 1;
    }
    
    if(!empty($_POST["page"])) {
        $page = $_POST["page"];
    } else {
        $page = 1;
    }

    $cart = Cart::getInstance();
    $cart->addItem($item, $quantity);
?>