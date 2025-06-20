<h2>Đăng ký học phần</h2>
<form method="post" action="/dangky/store">
    <label>Sinh viên:</label>
    <select name="sinhvien_id" required>
        <?php foreach ($sinhviens as $sv): ?>
            <option value="<?= $sv->id ?>"><?= $sv->masv ?> - <?= $sv->hoten ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Học phần:</label>
    <select name="hocphan_id" required>
        <?php foreach ($hocphans as $hp): ?>
            <option value="<?= $hp->id ?>"><?= $hp->mahp ?> - <?= $hp->tenhp ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <button type="submit">Đăng ký</button>
</form>