<?php
// 1. Hardcoded secret
$apiKey = "sk_live_1234567890abcdef";  // ❌ Should not be hardcoded

// 2. Insecure file upload
if (isset($_FILES['upload'])) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['upload']['name']);
    move_uploaded_file($_FILES['upload']['tmp_name'], $uploadFile);  // ❌ No file type check
}

// 3. Insecure cryptography
$password = $_POST['password'];
$hashed = md5($password);  // ❌ Weak hashing, use password_hash()

// 4. Dangerous function usage
$code = $_GET['code'];
eval($code);  // ❌ Remote code execution

// 5. Missing access control
if ($_GET['debug'] === 'true') {
    phpinfo();  // ❌ Should be protected
}
?>
