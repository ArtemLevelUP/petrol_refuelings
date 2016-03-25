<?php
include 'bootstrap.php';
return [
    'dbname' => $conn['dbname'],
    'user' => $conn['user'],
    'password' => $conn['password'],
    'host' => $conn['host'],
    'driver' => 'mysqli',
];