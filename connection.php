<?php
require_once 'settings.php';
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error)
    die ('Connection error');
?>