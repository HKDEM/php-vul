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
