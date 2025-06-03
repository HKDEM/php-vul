<?php
// Simulate input from user
$username = $_GET['user'];
$password = $_GET['pass'];
$search   = $_GET['q'];
$page     = $_GET['page'];
$file     = $_GET['file'];

// 1. SQL Injection
$conn = mysqli_connect("localhost", "root", "", "testdb");
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

// 2. Cross-Site Scripting (XSS)
echo "<div>Search results for: $search</div>";

// 3. Command Injection
$output = shell_exec("ping -c 1 " . $_GET['host']);
echo "<pre>$output</pre>";

// 4. Local File Inclusion
include($file);

// 5. Weak password hashing
$hashed = md5($password);
echo "Your password hash is: $hashed";

// 6. Exposing errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
