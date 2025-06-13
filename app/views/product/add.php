<?php include __DIR__ . '/../views/shares/header.php'; ?>

<h1>Thêm sản phẩm mới 🆕</h1>

<form id="add-product-form" class="mt-4">

<div class="form-group mb-3">
<label for="name">Tên sản phẩm:</label>
<input type="text" id="name" name="name" class="form-control" required>
</div>

<div class="form-group mb-3">
<label for="description">Mô tả:</label>
<textarea id="description" name="description" class="form-control" required></textarea>
</div>

<div class="form-group mb-3">
<label for="price">Giá:</label>
<input type="number" id="price" name="price" class="form-control" step="0.01" required>
</div>

<div class="form-group mb-3">
<label for="category_id">Danh mục:</label>
<select id="category_id" name="category_id" class="form-control" required>
<!-- Danh mục sẽ được load từ API -->
</select>
</div>

<button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
<a href="/phatmaiquy/Product" class="btn btn-secondary mt-2">Quay lại danh sách</a>
</form>

<?php include __DIR__ . '/../views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function () {
// Load danh mục từ API
fetch('/phatmaiquy/api/category')
.then(res => res.json())
.then(data => {
const select = document.getElementById('category_id');
data.forEach(cat => {
const option = document.createElement('option');
option.value = cat.id;
option.textContent = cat.name;
select.appendChild(option);
});
});

// Bắt sự kiện submit
document.getElementById('add-product-form').addEventListener('submit', function (event) {
event.preventDefault();

const formData = new FormData(this);
const jsonData = {};
formData.forEach((value, key) => {
jsonData[key] = value;
});

fetch('/phatmaiquy/api/product', {
method: 'POST',
headers: {
'Content-Type': 'application/json'
},
body: JSON.stringify(jsonData)
})
.then(res => res.json())
.then(data => {
if (data.message === 'Product created successfully') {
alert('✅ Thêm sản phẩm thành công!');
window.location.href = '/phatmaiquy/Product';
} else {
alert('❌ Lỗi: ' + (data.errors?.name || data.message));
}
})
.catch(err => {
console.error(err);
alert('❌ Có lỗi xảy ra khi gửi dữ liệu.');
});
});
});
</script>