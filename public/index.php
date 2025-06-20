<?php
$url = $_GET['url'] ?? 'sinhvien';
$urlParts = explode('/', $url);

// Controller
$controllerName = ucfirst($urlParts[0]) . 'Controller';
$method = $urlParts[1] ?? 'index';
$param = $urlParts[2] ?? null;

// Load controller
$controllerPath = "../app/controllers/$controllerName.php";
if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        // Gọi phương thức có tham số nếu có
        if ($param !== null) {
            $controller->$method($param);
        } else {
            $controller->$method();
        }
    } else {
        echo "Method $method not found in controller $controllerName.";
    }
} else {
    echo "Controller file $controllerPath not found.";
}
?>