<?php
    $cart = Cart::getInstance();
    $items = $cart->getItems();
    $idNum = array_keys($items);
    $ids = implode(",",$idNum);
    
    $i = 0;
    

    $db = Db::getDb();
    
    
if(!empty($items)){
    try {

        $query = "SELECT * FROM items WHERE id IN(" . $ids . ")";
        $statement = $db->prepare($query);

        $statement->execute();

        $results = $statement->fetch(PDO::FETCH_ASSOC);
        
        while($results) {
            $quantity = $items[$results['id']];
            $itemsToView [] = array(new item($results), $quantity);
            $results = $statement->fetch(PDO::FETCH_ASSOC);
        };
        

    

    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
}
?>