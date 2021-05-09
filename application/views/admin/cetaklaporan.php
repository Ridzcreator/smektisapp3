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
                    <h5 class="page-header">
                        <b class="loat-left">Bee Movie</b>
                        <small class="float-right"><?= date('l, d-m-Y '); ?></small>
                    </h5>
                </div>
                <!-- /.col -->
            </div>

            <br><br>
            <!-- info row -->

            <center>
                <h1>LAPORAN PERSEWAAN ALAT MULTIMEDIA</h1>
                <h3>SMK TERPADU AL ISHLAHIYAH</h3>
            </center>
            <br>
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan</th>
                                <th>Nama Penyewa</th>
                                <th>Barang Disewa</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $total = 0;
                            foreach ($barang_pinjam as $data) {
                                $subtotal = $data->jumlah * $data->harga;
                                $total += $subtotal;
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td></td>
                                    <td><?= $transaksi->penyewa_nama; ?></td>
                                    <td>
                                        <?php
                                        $transaksi_barang[$no - 1] = [];
                                        foreach ($barang_pinjam as $b) {
                                            if ($b->t_id == $data->t_id) {
                                                array_push($transaksi_barang[$no - 1], $b->nama . ($b->jumlah > 1 ? (' (' . $b->jumlah . ')') : ''));
                                            }
                                        }
                                        echo implode(', ', $transaksi_barang[$no - 1]);
                                        ?>
                                    </td>
                                    <td><?= $transaksi->tanggal_pinjam; ?></td>
                                    <td><?= $transaksi->tanggal_kembali; ?></td>
                                    <td><?= $transaksi->status_nama; ?></td>
                                    <td><?= $total; ?></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <div class="float-right">
                <p class="lead">Jumlah Transaksi</p>

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