<?php
// db.php
$host = 'localhost';
$db = 'user_db';
$user = 'your_db_user';
$pass = 'your_db_password';

$conn = pg_connect("host=$host dbname=$db user=$user password=$pass");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
