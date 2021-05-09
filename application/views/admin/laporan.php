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
                                    <form action="enhanced-results.html">
                                        <div class="row">
                                            <div class="col-md-10 offset-md-1">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Kategori:</label>
                                                            <select class="select2" multiple="multiple" data-placeholder="Any" style="width: 100%;">
                                                                <option>Text only</option>
                                                                <option>Images</option>
                                                                <option>Video</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Bulan</label>
                                                            <select class="select2" style="width: 100%;">
                                                                <option selected>ASC</option>
                                                                <option>DESC</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Tahun</label>
                                                            <select class="select2" style="width: 100%;">
                                                                <option selected>Title</option>
                                                                <option>Date</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group input-group-lg">
                                                        <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-lg btn-default">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            <table id="laporan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Bulan</th>
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
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td></td>
                                            <td><?= $data->penyewa_nama; ?></td>
                                            <td>
                                                <?php
                                                $transaksi_barang[$no - 1] = [];
                                                foreach ($barang_pinjam as $b) {
                                                    if ($b->t_id == $data->t_id) {
                                                        array_push($transaksi_barang[$no - 1], $b->nama . ($b->jumlah > 1 ? (' (' . $b->jumlah . ')') : ''));
                                                    }
                                                }
                                                echo implode(', ', $transaksi_barang[$no - 1]);
                                                ?></td>
                                            <td><?= $data->tanggal_pinjam; ?></td>
                                            <td><?= $data->tanggal_kembali; ?></td>
                                            <td></td>
                                            <td></td>
                                            <!-- <td class="d-flex justify-content-between">
                                                <a class="text-link text-primary" href="<?php echo base_url('admin/Nota'); ?>" title="Detail">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td> -->
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                            <div class="card-header">
                                <a type="button" class="btn btn-outline-primary float-right" href="<?php echo base_url('admin/laporan/print/' . $data->t_id); ?>" target="_blank"><i class="fa fa-print"></i> Cetak Laporan</a>
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