<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fa fa-file text-primary"></i> Laporan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus-circle"></i> Tambah</button>
                            <h3 class="card-title" style="width: 100%;"><marquee behavior="" direction="left">Ini info terbaru</marquee></h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <section class="content">
                                <div class="container-fluid">
                                    <form action="<?php echo base_url('admin/laporan'); ?>" method="post">
                                        <div class="row">
                                            <div class="col-md-6 offset-md-1">
                                                <div class="float-right">
                                                    <center>
                                                        <label>Filter:</label>
                                                    </center>
                                                    <div class="row">
                                                        <input hidden type="date" name="date_start" id="date_start">
                                                        <input hidden type="date" name="date_end" id="date_end">
                                                    </div>
                                                    <div class="row">

                                                        <!-- Date range -->
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="far fa-calendar-alt"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control float-right" name="daterange" <?= isset($daterange) ? 'value="'.$daterange.'"' : ''; ?>>
                                                                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search"></i> Cari</button>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Penyewa</th>
                                        <th>Barang Disewa</th>
                                        <th>Tanggal Sewa/Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($transaksi as $data) {
                                        if ($data->tanggal_kembali != "") {
                                    ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data->penyewa_nama; ?></td>
                                                <td>
                                                    <?php
                                                    $transaksi_barang[$no - 1] = [];
                                                    $total = 0;
                                                    foreach ($barang_pinjam as $b) {
                                                        if ($b->t_id == $data->t_id) {
                                                            array_push($transaksi_barang[$no - 1], $b->nama . ($b->jumlah > 1 ? (' (' . $b->jumlah . ')') : ''));
                                                            $total += ($b->status_id == 1 ? 0 : $b->harga) * $b->jumlah;
                                                        }
                                                    }
                                                    echo implode(', ', $transaksi_barang[$no - 1]);
                                                    ?></td>
                                                <td><?= $data->tanggal_pinjam; ?></td>
                                                <td><?= $data->tanggal_kembali; ?></td>
                                                <td><?= $data->status_nama; ?></td>
                                                <td>
                                                    <?php
                                                    echo $total;
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>

                            </table>
                            <div class="card-header">
                                <form action="<?php echo base_url('admin/laporan/print'); ?>" method="post" target="_blank">
                                    <input hidden type="text" name="date_start" value="<?= isset($date_start) ? $date_start : ''; ?>">
                                    <input hidden type="text" name="date_end" value="<?= isset($date_end) ? $date_end : ''; ?>">
                                    <button type="submit" class="btn btn-outline-primary float-right"><i class="fa fa-print"></i> Cetak Laporan</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <!-- Modal -->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama Penyewa</label>
                                <input type="nama" class="form-control" id="nama" placeholder="Masukkan Nama Penyewa">
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="alamat">Alamat Penyewa</label>
                                <input type="nama" class="form-control" id="nama" placeholder="Masukkan Alamat Penyewa">
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email">Email Penyewa</label>
                                <input type="nama" class="form-control" id="nama" placeholder="Masukkan Email Penyewa">
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="notelp">Nomor Telpon Penyewa</label>
                                <input type="nama" class="form-control" id="nama" placeholder="Masukkan Nomor Telpon Penyewa">
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="notelp">Sosial Media</label>
                                <input type="nama" class="form-control" id="nama" placeholder="Masukkan Social Media Penyewa">
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin Penyewa</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Pilih Jenis Kelamin Penyewa</option>
                                        <option value="1">Laki - Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->