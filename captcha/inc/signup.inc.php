<?php
require_once 'dbh.inc.php';
require_once 'signup_model.inc.php';

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    set_user($pdo, $email, $password);
    echo "Success";
}