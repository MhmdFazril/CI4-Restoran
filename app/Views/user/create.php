<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col border mt-3">
            <h4>RINCIAN PEMBELIAN</h4>
            <hr>
            <img src="/img/default.jpeg" alt="" class="sampul-beli">
            <hr>
            <h3 class="mb-2"><?= strtoupper($product['name']); ?></h3>
            <p><i><?= $product['description']; ?></i></p>
            <br>
            <p>Asal Makanan : <?= $product['source']; ?></p>
            <p>Bahan Makanan : <?= $product['material']; ?></p>
            <h4>Rp<?= number_format($product['price'], 0, ',', '.'); ?></h4>
            <br>
            <form action="/user/save" method="">
                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label"><b>Jumlah</b></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control " id="penulis" name="penulis" value="">
                        <div class="invalid-feedback">
                            <p>test</p>
                        </div>
                    </div>
                </div>
                <a href="/user/dashboard" class="btn btn-danger mr-3">Kembali</a>
                <button type="submit" class="btn btn-success">Beli</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>