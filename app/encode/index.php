<?php

require_once '../../vendor/autoload.php';
require_once '../../config/key.php';

use Firebase\JWT\JWT;


$payload = [
    'domain'   => 'localhost',
    'username' => 'user123',
    'password' => 'pass123'
];

$encoded = JWT::encode($payload, JWT_SECRET_KEY, 'HS256');

echo $encoded;
