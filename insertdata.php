<?php

if (isset($_POST["add_student"])) {

    $name = $_POST["n_name"];
    $email = $_POST["n_email"];
    $address = $_POST["address"];

    if (empty($name) || empty($email) || empty($address)){
        header("location:index.php?message=This%20is%20a%20error%20message");
    }
}

?>