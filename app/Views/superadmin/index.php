<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container form-wrapper">
    <h1 class="mb-4"><b>Welcome SuperAdmin</b></h1>
    <a href="/dashboard" class="btn btn-warning mb-3">Kembali</a>
    <div class="row d-flex justify-content-around">
        <div class="card" style="width: 18rem;">
            <img src="/img/folder.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><b>Admin</b></h5>
                <p class="card-text">Data para pemegang akun dengan role admin</p>
                <a href="/superadmin/manage-admin" class="btn btn-primary">Manage</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="/img/cv.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><b>Add Admin</b></h5>
                <p class="card-text">Menambah akun untuk mengakses aplikasi</p>
                <a href="/superadmin/add-admin" class="btn btn-primary">Add Tambah</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="/img/building.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><b>Management Office</b></h5>
                <p class="card-text">Mengelola Kantor cabang seperti menambah dan mengedit</p>
                <a href="/superadmin/manage-office" class="btn btn-primary">Manage</a>
            </div>
        </div>
    </div>
    <br><br>
</div>
<?= $this->endSection(); ?>