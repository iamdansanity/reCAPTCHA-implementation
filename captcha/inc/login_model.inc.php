<?php

function get_user($pdo,string $email) {
    try {
        $query = "SELECT * FROM user_table WHERE email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result === false) {
            echo "No user found with username: $email\n";
            return null; // No user found
        }
        
        return $result;
    }
    catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}