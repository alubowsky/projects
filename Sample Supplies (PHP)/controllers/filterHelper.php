<?php

if(! empty($_GET["min"])) {
    if(!is_numeric($_GET["min"])) {
        $errors[] = "min must be a number";
    } else {
        $min = $_GET["min"];
    }
}

if(! empty($_GET["max"])) {
    if(!is_numeric($_GET["max"])) {
        $errors[] = "max must be a number";
    } else {
        $max = $_GET["max"];
    }
}

if(! empty($_GET["page"])) {
    if(!is_numeric($_GET["page"])) {
        $errors[] = "page must be a number";
    } else {
        $page = $_GET["page"];
    }
}
?>