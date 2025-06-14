<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/CategoryModel.php';

class ProductController
{
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    private function requireAdmin() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            echo "<h3 style='color:red;text-align:center'>Bạn không có quyền truy cập chức năng này.</h3>";
            exit();
        }
    }

    public function index()
    {
        $products = $this->productModel->getProducts();
        include __DIR__ . '/../views/product/list.php';
    }

    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include __DIR__ . '/../views/product/show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function add()
    {
        $categories = (new CategoryModel($this->db))->getCategories();
        include __DIR__ . '/../views/product/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;

            // Xử lý ảnh upload
            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageName = basename($_FILES['image']['name']);
                $targetPath = __DIR__ . '/../../uploads/' . $imageName;

                if (!is_dir(__DIR__ . '/../../uploads')) {
                    mkdir(__DIR__ . '/../../uploads', 0777, true);
                }

                move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
                $image = $imageName;
            }

            $result = $this->productModel->addProduct($name, $description, $price, $category_id, $image);

            if (is_array($result)) {
                $errors = $result;
                $categories = (new CategoryModel($this->db))->getCategories();
                include __DIR__ . '/../views/product/add.php';
            } else {
                header('Location: /phatmaiquy/Product');
            }
        }
    }

    public function edit($id)
    {
        $product = $this->productModel->getProductById($id);
        $categories = (new CategoryModel($this->db))->getCategories();

        if ($product) {
            include __DIR__ . '/../views/product/edit.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];

            $edit = $this->productModel->updateProduct($id, $name, $description, $price, $category_id);

            if ($edit) {
                header('Location: /phatmaiquy/Product');
            } else {
                echo "Đã xảy ra lỗi khi lưu sản phẩm.";
            }
        }
    }

    public function delete($id)
    {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            echo "<h3 style='color:red; text-align:center'>Bạn không có quyền xóa sản phẩm.</h3>";
            exit();
        }

        if ($this->productModel->deleteProduct($id)) {
            header('Location: /phatmaiquy/Product');
        } else {
            echo "Đã xảy ra lỗi khi xóa sản phẩm.";
        }
    }
}
?>