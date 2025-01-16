<?php
// db.php
$host = 'dpg-cu4da4rtq21c73cpp0ug-a';
$db = 'test_7l2g';
$user = 'test';
$pass = 'SG6sI0xmQQeCY0MzGV56aFc5CTNQ1hoa';

$conn = pg_connect("host=$host dbname=$db user=$user password=$pass");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}



// Create the 'users' table if it doesn't exist
$tableCheckQuery = "
    CREATE TABLE IF NOT EXISTS users (
        id SERIAL PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL
    );
";

// Execute the query to create the table
$result = pg_query($conn, $tableCheckQuery);

if (!$result) {
    echo "Error creating table: " . pg_last_error($conn);
} else {
    echo "Table 'users' is ready to use.<br>";
}
?>
