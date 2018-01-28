<?php
    if(empty($errors)) {
        $db = Db::getDb();
        $query = "INSERT INTO items(name, description, price, url) VALUES(:name,:description, :price, :url)";
        $statement = $db->prepare($query);
        $statement->bindValue("name", $itemName);
        $statement->bindValue("description", $description);
        $statement->bindValue("price", $price);
        $statement->bindValue("url", $url);
        try {
            $statement->execute();
            header('Location: index.php?action=addItem');
            $_SESSION['success'] = $itemName . " successfully added"; 
            exit;
        } catch(PDOException $e){
        $errors[] = $e->getMessage();
        }
    } else {
        $errors[] = "could not add item";
    }

    if(empty($errors)){
        header("Location: index.php?action=addItem");
    }

?>
