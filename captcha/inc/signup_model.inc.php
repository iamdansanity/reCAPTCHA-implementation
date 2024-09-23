<?php

function set_user(object $pdo, string $email, string $password) {
    $query = "INSERT INTO user_table (email, password) VALUES (:email, :password)";
    $stmt = $pdo->prepare($query);
    
    $options = [
        'cost' => 12
    ];

    // Hash the password using bcrypt
    $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

    // Bind the email and hashed password to the query
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashedPwd);
    
    // Execute the query
    $stmt->execute();
}
