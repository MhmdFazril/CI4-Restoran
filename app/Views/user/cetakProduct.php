<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        header,
        main {
            padding: 50px 50px 0 50px;
        }

        header .line {
            margin-top: 5px;
            height: 2px;
            width: 100%;
            border-radius: 10px;
            background-color: black;
        }

        header .line2 {
            margin-top: 2px;
            height: 2px;
            width: 100%;
            border-radius: 10px;
            background-color: black;
        }

        .data-table {
            border-collapse: collapse;
            width: 100%;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .data-table th {
            background-color: #424242;
            color: white;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #B2B2B2;
        }

        main h2 {
            text-align: center;
        }

        .keterangan-table tr td {
            padding-right: 7px;
        }

        header .quotes {
            margin-bottom: 12px;
        }

        header .alamat {
            width: 400px;
        }
    </style>
</head>

<body>
    <header>
        <h2>RESTORAN BANG FAZRIL</h2>
        <p class="quotes"><i>Makan ya disini aja dijamin halal</i></p>
        <div class="alamat">
            <p><b><?= $cabang['location']; ?></b></p>
        </div>
        <div class="line"></div>
        <div class="line2"></div>
    </header>
    <main>
        <h2>INVOICE PEMBELIAN PRODUK</h2>
        <br>
        <div>
            <table class="keterangan-table">
                <tr>
                    <td>Admin</td>
                    <td>:</td>
                    <td><?= session()->get('account')['name']; ?></td>
                </tr>
                <tr>
                    <td>Nama Kantor</td>
                    <td>:</td>
                    <td><?= $cabang['office_name']; ?></td>
                </tr>
                <tr>
                    <td>Dicetak Pada</td>
                    <td>:</td>
                    <td><?= date('d F Y  H:i:s'); ?></td>
                </tr>
            </table>
            <!-- <p>Dicetak Oleh : </p>
            <p>Waktu : </p> -->
        </div>
        <br>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nama Pembeli</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Jumlah Pembelian</th>
                    <th>Subtotal</th>
                    <th>Role</th>
                    <th>Kantor Cabang</th>
                    <th>Waktu Transaksi</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?= $data['buyer']; ?></td>
                    <td><?= $data['name']; ?></td>
                    <td>Rp <?= number_format($data['price'], 0, ',', '.'); ?></td>
                    <td><?= $data['quantity']; ?></td>
                    <td>Rp <?= number_format($data['price'] * $data['quantity'], 0, ',', '.'); ?></td>
                    <td><?= $data['username']; ?></td>
                    <td><?= $data['office_name']; ?></td>
                    <td><?= date_format(new DateTime($data['created_time']), "d F Y, H:i:s"); ?></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>