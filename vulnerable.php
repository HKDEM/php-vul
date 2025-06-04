<?php

$user_input = $_GET['cmd'];
eval($user_input); // Should trigger TaintedEval

$query = "SELECT * FROM users WHERE name = '" . $_GET['name'] . "'";
mysqli_query($conn, $query); // Should trigger SQL injection

include($_GET['file']); // Should trigger TaintedInclude

$output = shell_exec($_GET['run']); // Should trigger TaintedShell

$serialized = $_GET['data'];
$data = unserialize($serialized); // Should trigger TaintedUnserialize

echo $_GET['xss']; // Should trigger TaintedHtml or XSS
