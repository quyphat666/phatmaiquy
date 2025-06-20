<?php include_once __DIR__ . '/../shares/header.php'; ?>

<div class="container mt-4">
    <h3><i class="fas fa-users"></i> Danh sách Sinh viên</h3>
    <a href="?url=sinhvien/create" class="btn btn-success mb-3">+ Thêm sinh viên</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Mã SV</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Hình</th>
                <th>Mã ngành</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhviens as $sv): ?>
                <tr>
                    <td><?= htmlspecialchars($sv['MaSV']) ?></td>
                    <td><?= htmlspecialchars($sv['HoTen']) ?></td>
                    <td><?= htmlspecialchars($sv['GioiTinh']) ?></td>
                    <td><?= htmlspecialchars($sv['NgaySinh']) ?></td>
                    <td>
                        <?php if (!empty($sv['Hinh'])): ?>
                            <img src="/uploads/<?= $sv['Hinh'] ?>" width="60">
                        <?php else: ?>
                            Không có
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($sv['MaNganh']) ?></td>
                    <td>
                        <a href="?url=sinhvien/edit/<?= $sv['MaSV'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="?url=sinhvien/delete/<?= $sv['MaSV'] ?>" onclick="return confirm('Bạn chắc chắn muốn xoá?')" class="btn btn-danger btn-sm">Xoá</a>
                        <a href="?url=sinhvien/detail/<?= $sv['MaSV'] ?>" class="btn btn-info btn-sm">Chi tiết</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once __DIR__ . '/../shares/footer.php'; ?>