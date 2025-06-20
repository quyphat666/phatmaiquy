<h2>Danh sách học phần</h2>
<a href="?url=hocphan/create">➕ Thêm học phần</a>
<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Mã HP</th>
            <th>Tên học phần</th>
            <th>Số tín chỉ</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hocphans as $hp): ?>
            <tr>
                <td><?= htmlspecialchars($hp['ID']) ?></td>
                <td><?= htmlspecialchars($hp['MaHP']) ?></td>
                <td><?= htmlspecialchars($hp['TenHP']) ?></td>
                <td><?= htmlspecialchars($hp['SoTinChi']) ?></td>
                <td>
                    <a href="?url=hocphan/edit/<?= $hp['ID'] ?>">✏️</a> |
                    <a href="?url=hocphan/delete/<?= $hp['ID'] ?>" onclick="return confirm('Xóa học phần?')">🗑️</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>