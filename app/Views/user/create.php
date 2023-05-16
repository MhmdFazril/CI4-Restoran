<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col border border-1 mt-3">
            <?php $error = session()->get('_ci_validation_errors'); ?>
            <h4>RINCIAN PEMBELIAN</h4>
            <hr>
            <img src="/img/default.jpeg" alt="" class="sampul-beli">
            <hr>
            <h3 class="mb-2"><?= strtoupper($product['name']); ?></h3>
            <p><i><?= $product['description']; ?></i></p>
            <br>
            <p>Asal Makanan : <?= $product['source']; ?></p>
            <p>Bahan Makanan : <?= $product['material']; ?></p>
            <p>Stok Tersedia : <?= $product['quantity']; ?></p>
            <br>
            <h4>Rp<?= number_format($product['price'], 0, ',', '.'); ?></h4>
            <br>
            <form action="/user/save" method="">
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label"><b>Jumlah</b></label>
                    <div class="col-sm-10">
                        <input type="hidden" name="id" id="id" value="<?= $product['id'] ?>">
                        <input type="hidden" name="office" id="office" value="<?= $product['id'] ?>">
                        <input type="number" class="form-control <?= isset($error['jumlah']) ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" value="" placeholder="Jumlah barang" autofocus>
                        <div class="invalid-feedback">
                            <?= isset($error['jumlah']) ? $error['jumlah'] : ''; ?>
                        </div>
                    </div>
                </div>
                <a href="/user/dashboard" class="btn btn-danger mr-3">Kembali</a>
                <button type="submit" class="btn btn-success">Beli</button>
                <br><br><br>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>