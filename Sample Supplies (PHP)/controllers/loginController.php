<?php 
    require_once "utils/Db.php";
    $username = '';
    $password = '';
    $admin = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(!empty($_POST['username'])) {
            $username = $_POST['username'];
            
            if(!empty($_POST['password'])) {
                $password = $_POST['password'];  
                include 'models/loginModel.php';  
            }   
            else {
                $errors[] = "Username and password are required";
            }
   
        }
        else {
            $errors[] = "Username and password are required";
        }
    } 
    
    
    include 'views/loginView.php';
?>