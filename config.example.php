<?php
/**
 * Favlyo Database Configuration
 * 
 * INSTRUCTIONS:
 * 1. Copy this file to config.php
 * 2. Update the credentials below with your actual database details
 * 3. Never commit config.php with real passwords to git
 */

// Detect environment: local (XAMPP) vs production (Hostinger)
$isLocal = ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1');

try {
    if ($isLocal) {
        // Local XAMPP Development
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'favlyo');           // Your local database name
        define('DB_USER', 'root');             // XAMPP default user
        define('DB_PASS', '');                 // XAMPP default (empty)
        define('DB_CHARSET', 'utf8mb4');
    } else {
        // Production (Hostinger) - UPDATE THESE VALUES
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'YOUR_DB_NAME');     // e.g., u202272910_favlyo0009
        define('DB_USER', 'YOUR_DB_USER');     // e.g., u202272910_favlyo0009
        define('DB_PASS', 'YOUR_DB_PASSWORD'); // Your actual password
        define('DB_CHARSET', 'utf8mb4');
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo "Configuration error.";
    exit;
}
?>
