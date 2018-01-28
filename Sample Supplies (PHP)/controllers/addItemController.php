<?php
    require_once "utils/loggedinonly.php";
    include_once 'utils/Db.php';
    if(isset($_SESSION['admin'])){
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            if(!empty($_POST['itemName'])) {
                $itemName = $_POST['itemName'];

                if(!empty($_POST['description'])) {
                    $description = $_POST['description'];
                }else{
                    $description = '';
                }
                
                if(!empty($_POST['price']) && is_numeric($_POST['price']) &&($_POST['price'] > 0)) {
                    $price = $_POST['price'];
                }else{
                    $errors[] = "Price is required and must be greater than 0";
                }

                if(!empty($_POST['url'])) {
                    $url = $_POST['url'];
                }
                else{
                    $url = '';
                }
                include 'models/addItemModel.php';
            }else{
                $errors[] = "item Name Required";
            }
    
        }
        
        include 'views/addItemView.php';
    }  

    else{
        $errors[] = "not an adiministrater";
        header('Location: views/error.php');
    }
?>