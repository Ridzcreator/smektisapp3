<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/AdminLTE/dist/css/adminlte.min.css'); ?>">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <img src="<?php echo base_url('assets/img/Logonota.png'); ?>" alt="Bee Movie Logo" class="img-fluid" width="25%">
                        <small class="float-right"><?= date('l, d-m-Y '); ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>

            <br><br>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Bee Movie </strong><br>
                        Jl. Kramat 81 Singosari<br>
                        Instagram: beemovienumber1<br>
                        Email: beemovienumber1@gmai.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?= $transaksi->penyewa_nama; ?></strong><br>
                        <?= $transaksi->alamat; ?><br>
                        Phone: <?= $transaksi->no_telp; ?><br>
                        Email: <?= $transaksi->email; ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #<?= $transaksi->t_id; ?></b><br>
                    <b>Status :</b> <?= $transaksi->status_nama; ?><br>
                    <b>Return:</b> <?= date("d/m/Y H:i:s", strtotime('+' . ($transaksi->durasi * 24) . ' hours', strtotime($transaksi->tanggal_pinjam))); ?><br>
                    <b>Account:</b> <?= $transaksi->p_id; ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $total = 0;
                            foreach ($barang_pinjam as $barang) {
                                $no++;
                                // if ($barang->status_id == 1) {
                                //     $barang->harga = 0;
                                // }
                                // $subtotal = $barang->jumlah * ($barang->status_id == 1 ? 0 : $barang->harga);
                                $subtotal = $barang->jumlah * $barang->harga;
                                $total += $subtotal;
                                if ($barang->status_id == 1) {
                                    $total = 0;
                                }
                                echo "
                                    <tr>
                                        <td>$no</td>
                                        <td>$barang->nama</td>
                                        <td>$barang->jumlah</td>
                                        <td>$barang->harga</td>
                                        <td>$subtotal</td>
                                    </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <!-- <p class="lead">Payment Methods:</p>
                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
                        jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p> -->
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Jumlah Transaksi <?= date(' d-m-Y '); ?></p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Total:</th>
                                <td><?= $total; ?></td>
                            </tr>
                            <!-- <tr>
                                <th>Tax (9.3%)</th>
                                <td>$10.34</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>$5.80</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>$265.24</td>
                            </tr> -->
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>