<?php
    if (empty($min)) {
    $min = '';
    }

    if (empty($max)) {
        $max = '';
    }

    if (empty($page)) {
        $page = 0;
    }

    $numPerPage = 12;

    $db = Db::getDb();

    try {

        $query1 = "SELECT COUNT(*) FROM items WHERE (:min = '' OR price >= :min)
        AND (:max = '' OR price <= :max)";
        $statement1 = $db->prepare($query1);
        $statement1->bindValue('min', $min);
        $statement1->bindValue('max', $max);
        $statement1->execute();
        $totalItems = $statement1->fetchColumn();

        $query = "SELECT * FROM items WHERE (:min = '' OR price >= :min)
                                    AND (:max = '' OR price <= :max)
                                    LIMIT :page, :perPage";

        $statement = $db->prepare($query);

        $statement->bindValue('min', $min);
        $statement->bindValue('max', $max);
        $statement->bindValue('page', (int)$page * $numPerPage, PDO::PARAM_INT);
        $statement->bindValue('perPage', $numPerPage, PDO::PARAM_INT);



        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        
        while($results) {
            $items [] = new item($results);
            $results = $statement->fetch(PDO::FETCH_ASSOC);
        };

    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>

