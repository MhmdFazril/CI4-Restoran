<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <h2 class="mt-2 mb-4">Histori Pembelian</h2>

        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Jumlah Pembelian</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Cabang</th>
                    <th scope="col">Waktu</th>


                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($item as $list) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $list['name']; ?></td>
                        <td>Rp <?= number_format($list['price'], 0, ',', '.'); ?></td>
                        <td><?= $list['quantity']; ?></td>
                        <td>Rp <?= number_format($list['price'] * $list['quantity'], 0, ',', '.'); ?></td>
                        <td><?= $list['username']; ?></td>
                        <td><?= $list['office_name']; ?></td>
                        <td><?= $list['created_time']; ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?= $this->endSection(); ?>