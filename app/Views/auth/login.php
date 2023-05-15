<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="bg">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                    <?php $error = session()->get('_ci_validation_errors'); ?>
                                    <?php if (session()->getFlashdata('alert')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session()->getFlashdata('alert'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (session()->getFlashdata('alert-login')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= session()->getFlashdata('alert-login'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <form action="auth/check" method="post">
                                        <div class="form-floating mb-3">
                                            <label for="inputUsername ">Username</label>
                                            <input class="form-control <?= isset($error['username']) ? 'is-invalid' : '' ?>" id="inputUsername" type="text" placeholder="Admin12" name="username" />
                                            <div class="invalid-feedback">
                                                <?= isset($error['username']) ? $error['username'] : ''; ?>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="inputPassword">Password</label>
                                            <input class="form-control <?= isset($error['password']) ? 'is-invalid' : '' ?>" id="inputPassword" type="password" placeholder="Password" name="password" />
                                            <div class="invalid-feedback">
                                                <?= isset($error['password']) ? $error['password'] : ''; ?>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary ">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="/auth/register">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>