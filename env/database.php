<?php

    $servername = getenv('DB_HOST');
    $username   = getenv('DB_USERNAME');
    $password   = getenv('DB_PASSWORD');
    $dbname     = getenv('DB_NAME');
    $port       = (int)(getenv('DB_PORT') ?: 3306);

    // Connect with explicit port to force TCP (not Unix socket)
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

    if (!$conn) {
        http_response_code(503);
        die('Database connection failed: ' . mysqli_connect_error());
    }
?>