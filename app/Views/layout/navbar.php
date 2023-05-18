<!-- As a heading -->
<nav class="navbar bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-white p-3 fs2 "><b>RESTORAN BANG FAZRIL </b></span>
        <div>
            <?php if (session()->get('account')['role'] == 'superadmin') : ?>
                <a href="/superadmin/manage" class="btn btn-light mr-5">Permission</a>
            <?php endif ?>
            <a href="/user/histori" class="btn btn-primary text-white mr-2">History</a>
            <a href="/logout" class="btn btn-danger ml-2">Log Out</a>
        </div>

    </div>
</nav>