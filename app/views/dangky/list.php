<h2>Danh sách đăng ký học phần</h2>
<a href="/dangky/create">➕ Đăng ký mới</a>
<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Sinh viên</th>
            <th>Học phần</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dangkys as $dk): ?>
        <tr>
            <td><?= $dk->masv ?> - <?= $dk->hoten ?></td>
            <td><?= $dk->mahp ?> - <?= $dk->tenhp ?></td>
            <td>
                <a href="/dangky/delete/<?= $dk->id ?>" onclick="return confirm('Xóa?')">🗑️ Xóa</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>