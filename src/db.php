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
?>
