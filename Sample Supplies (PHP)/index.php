<?php

    //https only
    if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== "on") {
        http_response_code(302);
        header("Location: https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
        exit;
    }

    $action = "home";
    if(!empty($_GET['action'])) {
        $action = $_GET['action'];
    }

    if(!empty($_POST['action'])) {
        $action = $_POST['action'];
    }

    session_start();

    switch($action) {
        case 'home':
            include 'controllers/homeController.php';
            exit;
            
        case 'login':
            include 'controllers/loginController.php';
            exit;
            
        case 'addItem':
            include 'controllers/addItemController.php';
            exit;
            
        case 'logout':
            require_once "utils/loggedinonly.php";
            //include 'utils/autoload.php';
            include 'models/logout.php';
            exit;   
        
        case "addCart":
            //include 'utils/autoload.php';
            include "models/Cart.php";
            include "models/addToCart.php";
            $url = 'index.php?action=home&page=' . $page;
            header('Location:' . $url);
            exit;
            
        case "viewCart":
            //include 'utils/autoload.php';
            include "controllers/viewCart.php";
            exit;
            
        case "clear":
            include "models/Cart.php";
            include "models/clear.php";
            header("Location: index.php?action=home");
            exit;
            
            
        case "register" :
            include "utils/Db.php";
            include "models/registerModel.php";
            include "views/registerView.php";
            exit;
            
        case "remove":
            include "models/remove.php";
            exit;
            
        default:
            $error = "Dont know how to $action";
            include "views/error.php";
            exit;
    }
?>