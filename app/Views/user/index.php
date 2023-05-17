<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php if (empty(session()->get('account'))) {
  // return redirect()->back();
} ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="mt-4 mb-2">Dashboard</h2>
      <a href="admin/add-product" class="btn btn-primary mb-2">Add Product</a>
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produk</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Asal Produk</th>
            <th scope="col">Harga Produk</th>
            <th scope="col">Stok</th>
            <th scope="col">Transaksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($product as $produk) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><img src="/img/img_upload/<?= $produk['photo']; ?>" alt="" class="sampul"></td>
              <td><?= $produk['name']; ?></td>
              <td><?= $produk['source']; ?></td>
              <td>Rp<?= number_format($produk['price'], 0, ',', '.'); ?></td>
              <td><?= $produk['quantity']; ?></td>
              <td>
                <a href="/user/detail/<?= $produk['id']; ?>" class="btn btn-info">Detail</a>
                <a href="/user/create/<?= $produk['id']; ?>" class="btn btn-success">Beli</a>
              </td>
            </tr>
            <?php $i++ ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>