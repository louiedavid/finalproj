<?php # utilities.inc.php 
// This page needs to do the setup and configuration required by every other page.

// Autoload classes from "classes" directory:
function class_loader($class) {
    require('classes/' . $class . '.php');
}
spl_autoload_register('class_loader');

// Start the session:
session_start();

// Check for a user in the session:
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;

// Create the database connection as a PDO object:
try { 

    // Create the object:
    $pdo = new PDO('mysql:dbname=bos;host=localhost', 'root', '');

} catch (PDOException $e) { // Report the error!
    $pageTitle = 'Error!';
}