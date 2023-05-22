<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php if (empty(session()->get('account'))) {
  return redirect()->to(base_url('/'));
} ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="mt-4 mb-2">Dashboard</h2>
      <!-- testing session -->
      <?php d(session()->get('account')) ?>
      <!-- testing session -->
      <a href="admin/add-product" class="btn btn-primary mb-4">[+] Add Product</a>
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="bg-dark text-white rounded-left" scope="col">#</th>
            <th class="bg-dark text-white" scope="col">Produk</th>
            <th class="bg-dark text-white" scope="col">Nama Produk</th>
            <th class="bg-dark text-white" scope="col">Asal Produk</th>
            <th class="bg-dark text-white" scope="col">Harga Produk</th>
            <th class="bg-dark text-white" scope="col">Stok</th>
            <th class="bg-dark text-white rounded-right" scope="col">Transaksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 + (4 * ($currentPage - 1)) ?>
          <?php if (!count($product) == 0) : ?>
            <?php foreach ($product as $produk) : ?>
              <?php if ($produk['quantity'] == 0) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><img src="/img/img_upload/<?= $produk['photo']; ?>" alt="" class="sampul"></td>
                  <td><?= $produk['name']; ?></td>
                  <td><?= $produk['source']; ?></td>
                  <td>Rp<?= number_format($produk['price'], 0, ',', '.'); ?></td>
                  <td><b>HABIS</b></td>
                  <td>
                    <a href="/user/detail/<?= $produk['id']; ?>" class="btn btn-info">Detail</a>
                    <!-- <a href="/user/create/<?= $produk['id']; ?>" class="btn btn-success">Beli</a> -->
                  </td>
                </tr>
              <?php else : ?>
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
              <?php endif ?>
              <?php $i++ ?>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="7">
                <h3>Product masih kosong</h3>
              </td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
      <?= $pager->links('master_product', 'product_pagination'); ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>