<?php

require_once '../../vendor/autoload.php';
require_once '../../config/key.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$encoded = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkb21haW4iOiJsb2NhbGhvc3QiLCJ1c2VybmFtZSI6InVzZXIxMjMiLCJwYXNzd29yZCI6InBhc3MxMjMifQ.V7Ake15lAB9Y3i4lOqNZq_FBFHJPsM1itsp3YT_XIMM';

$decoded = JWT::decode($encoded, new Key(JWT_SECRET_KEY, 'HS256'));

echo "<pre>";
print_r($decoded);
echo "</pre>";

echo "Username: " . $decoded->username;
