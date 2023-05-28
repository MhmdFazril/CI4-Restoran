<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login-register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="contain">
        <div class="kotak">
            <div class="kotak-title">
                <h1>LOGIN</h1>
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
                <div class="line"></div>
            </div>
            <div class="kotak-body">
                <form action="auth/check" method="post">
                    <div class="form-floating mb-3">
                        <label for="inputUsername" class="text-white">Username</label>
                        <input class="form-control <?= isset($error['username']) ? 'is-invalid' : '' ?>" id="inputUsername" type="text" placeholder="Admin12" name="username" value="<?= old('username'); ?>" autocomplete="off" />
                        <div class="invalid-feedback">
                            <?= isset($error['username']) ? $error['username'] : ''; ?>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="inputPassword" class="text-white">Password</label>
                        <input class="form-control <?= isset($error['password']) ? 'is-invalid' : '' ?>" id="inputPassword" type="password" placeholder="Password" name="password" value="<?= old('password'); ?>" />
                        <div class="invalid-feedback">
                            <?= isset($error['password']) ? $error['password'] : ''; ?>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary ">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>