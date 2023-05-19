<!-- As a heading -->
<nav class="navbar bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-white p-3 fs2 "><b><a href="/dashboard" class="text-white resto">RESTORAN BANG FAZRIL </a></b></span>
        <div>
            <?php if (session()->get('account')['role'] == 'superadmin') : ?>
                <a href="/superadmin/manage" class="btn btn-light mr-2">Permission</a>
            <?php endif ?>
            <a href="/user/histori" class="btn btn-primary text-white ml-2 mr-2">History</a>
            <a href="/logout" class="btn btn-danger ml-2">Log Out</a>
        </div>

    </div>
</nav>