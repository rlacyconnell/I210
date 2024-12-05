<?php
// Default error message if not specified
$error = "An unknown error occurred.";

// Check if an error message is in the query string
if (isset($_GET['error'])) {
    $error = htmlspecialchars($_GET['error']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
</head>
<body>
<h2>Error</h2>
<p><?= $error ?></p>
</body>
</html>
