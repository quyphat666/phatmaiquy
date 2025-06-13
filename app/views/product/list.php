<?php include __DIR__ . '/../views/shares/header.php'; ?>

<div class="container my-5">
<div class="d-flex justify-content-between align-items-center mb-4">
<h2 class="text-dark">📦 Danh sách sản phẩm</h2>
<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
<a class="btn btn-add" href="/phatmaiquy/Product/add">+ Thêm sản phẩm</a>
<?php endif; ?>
</div>

<div class="row" id="product-list">
<!-- Các thẻ sản phẩm sẽ được thêm ở đây bằng JS -->
</div>
</div>

<footer class="bg-light text-center py-3 mt-5 border-top">
<small>© <?= date('Y') ?> Cửa hàng công nghệ - Bản quyền thuộc về bạn</small>
</footer>

<style>
.product-card {
border: 1px solid #dee2e6;
border-radius: 8px;
transition: box-shadow 0.3s ease;
}
.product-card:hover {
box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
}
.product-image {
width: 100%;
height: 200px;
object-fit: cover;
}
.btn-add, .btn-cart {
background-color: #ff4757;
border: none;
color: white;
}
.btn-add:hover, .btn-cart:hover {
background-color: #e84118;
}
.btn-edit {
background-color: #1e90ff;
color: white;
}
.btn-delete {
background-color: #e74c3c;
color: white;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
fetch('/phatmaiquy/api/product')
.then(res => res.json())
.then(data => {
const list = document.getElementById("product-list");
list.innerHTML = "";

data.forEach(product => {
const image = product.image ? product.image : 'default.png';
const isAdmin = <?= isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin' ? 'true' : 'false' ?>;

const col = document.createElement('div');
col.className = 'col-lg-3 col-md-4 col-sm-6 mb-4';
col.innerHTML = `
<div class="card product-card h-100">
<img src="/phatmaiquy/uploads/${image}" class="product-image" alt="Ảnh sản phẩm">
<div class="card-body d-flex flex-column">
<h5>${product.name}</h5>
<p>${product.description}</p>
<div class="price-tag mb-3">${parseInt(product.price).toLocaleString()} VND</div>
<div class="mt-auto">
<a href="/phatmaiquy/Cart/add/${product.id}" class="btn btn-cart w-100 mb-2">🛒 Thêm vào giỏ</a>
${isAdmin ? `
<a href="/phatmaiquy/Product/edit/${product.id}" class="btn btn-edit w-100 mb-2">✏️ Sửa</a>
<button onclick="deleteProduct(${product.id})" class="btn btn-delete w-100">🗑️ Xóa</button>
` : ''}
</div>
</div>
</div>
`;
list.appendChild(col);
});
});
});

function deleteProduct(id) {
if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
fetch(`/phatmaiquy/api/product/${id}`, {
method: 'DELETE'
})
.then(res => res.json())
.then(data => {
if (data.message === 'Product deleted successfully') {
location.reload();
} else {
alert("Xóa thất bại");
}
});
}
}
</script>
