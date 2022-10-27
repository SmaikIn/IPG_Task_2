<?php
require "config.php";
require "api.php";
require "model.php";
require "Auth.php";
header('Content-Type: application/json');
$token = Auth::getBearerToken();
if (!empty($_POST['department_id'])) {
    $department_id = trim($_POST['department_id']);
} else {
    $department_id = 0;
}
$response = Api::getData($token, $department_id, $connect);
print_r(json_encode($response));



