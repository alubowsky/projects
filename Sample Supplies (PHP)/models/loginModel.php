<?php

//require_once "utils/httpsonly.php";

if(!empty($username) && !empty($password)) {
    $db = Db::getDb();
    $query = "SELECT password, admin FROM users WHERE user_name = :username";
    $statement = $db->prepare($query);
    $statement->bindValue("username", $username);

    try {
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        $hash = $data['password'];
        $admin = $data['admin'];

        if(password_verify($password, $hash)) {
            $_SESSION['username'] = $username;
            
            if($admin == 1){
                $_SESSION['admin'] = $admin;
            }
            
            if(!empty($_SESSION['returnTo'])) {
                $url = $_SESSION['returnTo'];
                unset($_SESSION['returnTo']);
            } else {
                $url = "index.php?action=home";
            }
            http_response_code(302);
            header("Location: $url");
            exit;
        }
        $errors[] = "Username and password did not match our records. Please try again";
    } catch(PDOException $e){
        $errors[] = $e->getMessage();
    }
}
?>