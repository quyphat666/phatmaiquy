<?php
require_once('app/models/ProductModel.php');
require_once('app/config/database.php');

class CartController {
    private $productModel;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->productModel = new ProductModel($db);
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    public function add($id) {
        $product = $this->productModel->getProductById($id);
        if (!$product) {
            die("Sản phẩm không tồn tại.");
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Nếu đã có thì tăng số lượng
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$id] = [
                'product' => $product,
                'quantity' => 1
            ];
        }

        header("Location: /phatmaiquy/Cart/view");
        exit();
    }

    public function view() {
        include 'app/views/cart/view.php';
    }

    public function remove($id) {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header("Location: /phatmaiquy/Cart/view");
    }

    public function clear() {
        unset($_SESSION['cart']);
        header("Location: /phatmaiquy/Cart/view");
    }

    public function checkout() {
        // Giả sử thanh toán thành công
        unset($_SESSION['cart']);
        include 'app/views/cart/thankyou.php';
    }
}
