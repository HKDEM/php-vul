<?php
// 1. Hardcoded API key
$secretKey = "sk_live_1234567890abcdef"; // ❌ Hardcoded secret

// 2. Insecure file upload (no type check or filename sanitization)
if (isset($_FILES['upload'])) {
    $uploadPath = 'uploads/' . $_FILES['upload']['name'];
    move_uploaded_file($_FILES['upload']['tmp_name'], $uploadPath); // ❌ Arbitrary file write
}

// 3. Command injection
$cmd = $_GET['cmd'];
system($cmd); // ❌ Unsanitized user input to system()

// 4. SQL injection
$conn = new mysqli("localhost", "root", "", "test");
$user = $_GET['user'];
$password = $_GET['password'];
$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$password'";
$result = $conn->query($sql); // ❌ SQL injection

// 5. Weak cryptography
$password = $_POST['password'];
$hashed = md5($password); // ❌ Weak hash, use password_hash()

// 6. XSS vulnerability
$name = $_GET['name'];
echo "<div>Welcome, $name!</div>"; // ❌ No output encoding

// 7. Dangerous function usage
$code = $_GET['code'];
eval($code); // ❌ RCE

// 8. PHP Info exposure
if ($_GET['debug'] === 'true') {
    phpinfo(); // ❌ Sensitive environment leak
}

// 9. Unrestricted file read
$file = $_GET['file'];
echo file_get_contents($file); // ❌ LFI

// 10. CSRF (No token validation)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $conn->query("UPDATE users SET email='$email' WHERE id=1"); // ❌ No CSRF protection
}

// 11. Deserialization of untrusted input
$data = $_POST['payload'];
$obj = unserialize($data); // ❌ Insecure deserialization

// 12. Information disclosure in error
ini_set('display_errors', 1); // ❌ Should be off in prod
trigger_error("Test error with user input: " . $_GET['debug']); // ❌ Reveals details
?>
