<?php include 'app/views/shares/header.php'; ?>

<h2 class="text-center mb-4">🛒 Giỏ hàng của bạn</h2>

<?php if (empty($_SESSION['cart'])): ?>
    <div class="alert alert-info text-center">Giỏ hàng trống.</div>
<?php else: ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php $total = 0; ?>
        <?php foreach ($_SESSION['cart'] as $item): 
            $subtotal = $item['product']->price * $item['quantity'];
            $total += $subtotal;
        ?>
            <tr>
                <td><?= htmlspecialchars($item['product']->name) ?></td>
                <td><?= number_format($item['product']->price, 0, ',', '.') ?> VND</td>
                <td><?= $item['quantity'] ?></td>
                <td><?= number_format($subtotal, 0, ',', '.') ?> VND</td>
                <td><a href="/phatmaiquy/Cart/remove/<?= $item['product']->id ?>" class="btn btn-sm btn-danger">Xóa</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h4 class="text-right">Tổng cộng: <strong><?= number_format($total, 0, ',', '.') ?> VND</strong></h4>

    <div class="text-right">
        <a href="/phatmaiquy/Cart/checkout" class="btn btn-success">Thanh toán</a>
        <a href="/phatmaiquy/Cart/clear" class="btn btn-secondary">Xóa giỏ hàng</a>
    </div>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>
