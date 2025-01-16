<?php
// login.php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Query the database for the user
    $result = pg_query_params($conn, "SELECT * FROM users WHERE username = $1", array($username));
    
    if (pg_num_rows($result) == 1) {
        $user = pg_fetch_assoc($result);
        
        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            echo "Login successful!";
            // You can start a session or set cookies here
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that username!";
    }
}
?>

<form action="login.php" method="POST">
    <label for="username">Username: </label><br>
    <input type="text" name="username" id="username" required><br><br>
    
    <label for="password">Password: </label><br>
    <input type="password" name="password" id="password" required><br><br>
    
    <input type="submit" value="Login">
</form>
