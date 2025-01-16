<?php
// register.php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if username is already taken
    $result = pg_query_params($conn, "SELECT * FROM users WHERE username = $1", array($username));
    if (pg_num_rows($result) > 0) {
        echo "Username is already taken!";
    } else {
        // Hash the password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert the new user into the database
        $insert = pg_query_params($conn, "INSERT INTO users (username, password) VALUES ($1, $2)", array($username, $hashed_password));
        
        if ($insert) {
            echo "Registration successful!";
        } else {
            echo "Error: " . pg_last_error($conn);
        }
    }
}
?>

<form action="register.php" method="POST">
    <label for="username">Username: </label><br>
    <input type="text" name="username" id="username" required><br><br>
    
    <label for="password">Password: </label><br>
    <input type="password" name="password" id="password" required><br><br>
    
    <input type="submit" value="Register">
</form>
