<?php

function insert_contact(object $pdo, string $fullName, string $email, string $subject, string $message) {
    $sql = "INSERT INTO contact_form (fullName, email, subject, message) 
            VALUES (:fullName, :email, :subject, :message)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":fullName", $fullName);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":subject", $subject);
    $stmt->bindParam(":message", $message);
    
    $stmt->execute();
}
