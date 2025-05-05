<?php
return [
    'paths' => ['api/*'], // Cho phép tất cả API trong routes/api.php
    'allowed_methods' => ['*'], // Cho phép mọi phương thức (GET, POST, PUT, DELETE)
    'allowed_origins' => ['*'], // Cho phép tất cả frontend truy cập
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Cho phép tất cả headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false, // Nếu dùng cookie hoặc token, để `true`
];
