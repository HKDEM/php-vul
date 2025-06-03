<?php
// Simulated vulnerable PHP application

// 1. SQL Injection
$id = $_GET['id'];
$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$query = "SELECT * FROM users WHERE id = $id";  // ❌ vulnerable
$result = $db->query($query);

// 2. XSS
$name = $_GET['name'];
echo "Hello, " . $name;  // ❌ vulnerable to XSS

// 3. Command Injection
$file = $_GET['file'];
system("cat $file");  // ❌ vulnerable to command injection

// 4. Insecure Deserialization
$payload = $_POST['data'];
$obj = unserialize($payload);  // ❌ can lead to RCE if attacker controls $payload

// 5. Path Traversal
$image = $_GET['img'];
include("images/" . $image);  // ❌ could allow ../../../etc/passwd

// 6. Insecure Random
$token = rand();  // ❌ predictable, should use random_bytes() or random_int()
echo "Token: $token";
?>
