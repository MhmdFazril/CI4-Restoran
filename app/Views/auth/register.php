<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                <?php if (session()->getFlashdata('alert-regist')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('alert'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php $error = session()->get('_ci_validation_errors'); ?>
                            </div>
                            <div class="card-body">
                                <form action="/auth/create" method="post">
                                    <div class="form-floating mb-3">
                                        <label for="inputUsername">Username</label>
                                        <input class="form-control <?= isset($error['username']) ? 'is-invalid' : '' ?>" id="username" type="text" placeholder="MhmdFazril" name="username" />
                                        <div class="invalid-feedback">
                                            <?= isset($error['username']) ? $error['username'] : ''; ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <label for="inputEmail">Email address</label>
                                        <input class="form-control <?= isset($error['email']) ? 'is-invalid' : '' ?>" id="inputEmail" type="email" placeholder="name@example.com" name="email" />
                                        <div class="invalid-feedback">
                                            <?= isset($error['email']) ? $error['email'] : ''; ?>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <label for="inputPassword">Password</label>
                                                <input class="form-control <?= isset($error['password']) ? 'is-invalid' : '' ?>" id="inputPassword" type="password" placeholder="Create a password" name="password" />
                                                <div class="invalid-feedback">
                                                    <?= isset($error['password']) ? $error['password'] : ''; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <label for="inputPasswordConfirm">Confirm Password</label>
                                                <input class="form-control <?= isset($error['password']) ? 'is-invalid' : '' ?>" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="confirm_password" />
                                                <div class="invalid-feedback">
                                                    <?= isset($error['confirm_password']) ? $error['confirm_password'] : ''; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="/">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<?= $this->endSection(); ?>