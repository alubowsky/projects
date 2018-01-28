<?php
    unset($_SESSION['username']);
    unset($_SESSION['cart']);
    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
    }
    header("Location: index.php?action=login");
    exit;
?>