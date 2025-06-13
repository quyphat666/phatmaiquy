<?php include __DIR__ . '/../views/shares/header.php'; ?>

<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
echo "<div class='alert alert-danger text-center'>Bạn không có quyền sửa sản phẩm.</div>";
 include __DIR__ . '/../views/shares/footer.php';
exit();
}
?>

<h1>Sửa sản phẩm</h1>

<form id="edit-product-form">
<input type="hidden" id="id" name="id">

<div class="form-group">
<label for="name">Tên sản phẩm:</label>
<input type="text" id="name" name="name" class="form-control" required>
</div>

<div class="form-group">
<label for="description">Mô tả:</label>
<textarea id="description" name="description" class="form-control" required></textarea>
</div>

<div class="form-group">
<label for="price">Giá:</label>
<input type="number" id="price" name="price" class="form-control" step="0.01" required>
</div>

<div class="form-group">
<label for="category_id">Danh mục:</label>
<select id="category_id" name="category_id" class="form-control" required></select>
</div>

<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>

<a href="/phatmaiquy/Product" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>

<?php  include __DIR__ . '/../views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function () {
const productId = window.location.href.split('/').pop();

// Load dữ liệu sản phẩm
fetch(`/phatmaiquy/api/product/${productId}`)
.then(res => res.json())
.then(data => {
document.getElementById('id').value = data.id;
document.getElementById('name').value = data.name;
document.getElementById('description').value = data.description;
document.getElementById('price').value = data.price;
document.getElementById('category_id').value = data.category_id;
});

// Load danh mục
fetch('/phatmaiquy/api/category')
.then(res => res.json())
.then(categories => {
const select = document.getElementById('category_id');
categories.forEach(category => {
const option = document.createElement('option');
option.value = category.id;
option.textContent = category.name;
select.appendChild(option);
});
});

// Submit cập nhật
document.getElementById('edit-product-form').addEventListener('submit', function (e) {
e.preventDefault();
const formData = new FormData(this);
const jsonData = {};
formData.forEach((value, key) => {
jsonData[key] = value;
});

fetch(`/phatmaiquy/api/product/${jsonData.id}`, {
method: 'PUT',
headers: { 'Content-Type': 'application/json' },
body: JSON.stringify(jsonData)
})
.then(res => res.json())
.then(data => {
if (data.message === 'Product updated successfully') {
alert('✅ Cập nhật thành công');
window.location.href = '/phatmaiquy/Product';
} else {
alert('❌ Cập nhật thất bại');
}
});
});
});
</script>