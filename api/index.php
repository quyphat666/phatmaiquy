<?php
session_start();

// Đường dẫn chuẩn từ thư mục api/ ra ngoài app/
require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/models/ProductModel.php';
require_once __DIR__ . '/../app/models/CategoryModel.php';
require_once __DIR__ . '/../app/helpers/SessionHelper.php';

// URL định tuyến
$url = $_SERVER['PATH_INFO']??'/';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', ltrim($url, '/'));

// === Nếu là API request ===
if (isset($url[0]) && $url[0] === 'api' && isset($url[1])) {
    $apiName = ucfirst($url[1]); // ví dụ: product => Product
    $apiControllerName = $apiName . 'ApiController';
    $controllerPath = __DIR__ . '/../app/controllers/' . $apiControllerName . '.php';

    if (file_exists($controllerPath)) {
        require_once $controllerPath;
        $controller = new $apiControllerName();

        $method = $_SERVER['REQUEST_METHOD'];
        $id = $url[2] ?? null;

        switch ($method) {
            case 'GET':
                $action = $id ? 'show' : 'index';
                break;
            case 'POST':
                $action = 'store';
                break;
            case 'PUT':
                $action = $id ? 'update' : null;
                break;
            case 'DELETE':
                $action = $id ? 'destroy' : null;
                break;
            default:
                http_response_code(405);
                echo json_encode(['message' => 'Method Not Allowed']);
                exit;
        }

        if ($action && method_exists($controller, $action)) {
            $id ? call_user_func_array([$controller, $action], [$id]) : call_user_func([$controller, $action]);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Action not found']);
        }
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'Controller not found']);
    }

    exit; // dừng ở đây không xử lý tiếp phần web
}

// === Nếu không phải API thì xử lý route web ===
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' : 'DefaultController';
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

$controllerPath = __DIR__ . '/../app/controllers/' . $controllerName . '.php';
if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controller = new $controllerName();

    if (method_exists($controller, $action)) {
        call_user_func_array([$controller, $action], array_slice($url, 2));
    } else {
        die('Action not found');
    }
} else {
    die('Controller not found');
}
