<?php

require_once '../../vendor/autoload.php';
require_once '../../config/key.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$req_headers = apache_request_headers();
if(isset($req_headers['Authorization']) && trim($req_headers['Authorization']) !== '') {
    $decoded = null;
    try {
        $decoded = JWT::decode($req_headers['Authorization'], new Key(JWT_SECRET_KEY, 'HS256'));
    }
    catch (Exception $e) {
        echo "Unauthorized: " . $e->getMessage();
    }

    if($decoded) {
        if($decoded->domain && $decoded->username && $decoded->password) {
            if($decoded->domain === 'localhost' && $decoded->username === 'user123' && $decoded->password === 'pass123') {
                echo "<pre>\n";
                print_r($decoded);
                echo "</pre>\n";

                echo "Username: " . $decoded->username;
            }
            else
                echo "Unauthorized: Invalid Credentials";
        }
        else
            echo "Unauthorized: Invalid Authorization Parameters";
    }
}
else
    echo "Unauthorized: No Authorization Header";