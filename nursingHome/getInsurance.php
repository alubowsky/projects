<?php
require 'db.php';

$query = "SELECT name FROM insurances";
$stmt = $db->query($query);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($rows);

if(!empty($_GET['callback'])) {
    $callback = $_GET['callback'];
} else {
    $callback = 'callback';
}

echo "$callback(";
echo json_encode($rows);
echo ")";
?>