<h2>Sửa học phần</h2>
<form method="post" action="/hocphan/update/<?= $hp->id ?>">
    <label>Mã học phần:</label>
    <input type="text" name="mahp" value="<?= $hp->mahp ?>" required><br><br>
    <label>Tên học phần:</label>
    <input type="text" name="tenhp" value="<?= $hp->tenhp ?>" required><br><br>
    <label>Số tín chỉ:</label>
    <input type="number" name="sotinchi" value="<?= $hp->sotinchi ?>" required><br><br>
    <button type="submit">Cập nhật</button>
</form>