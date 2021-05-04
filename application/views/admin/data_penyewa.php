<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fa fa-address-card text-primary"></i> Data Penyewa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Penyewa</li>
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
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus-circle"></i> Tambah</button>
                            <!-- <h3 class="card-title" style="width: 100%;"><marquee behavior="" direction="left">Ini info terbaru</marquee></h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>E-mail</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th>Media Sosial</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($penyewa as $p) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p->nama; ?></td>
                                            <td><?= $p->alamat; ?></td>
                                            <td><?= $p->email; ?></td>
                                            <td><?= $p->no_telp; ?></td>
                                            <td><?= $p->media_sosial; ?></td>
                                            <td><?= $p->jenis_kelamin; ?></td>
                                            <td class="d-flex justify-content-between">
                                                <a class="text-link text-warning" href="#" title="Detail" data-toggle="modal" data-target="#detailModal<?= $p->id; ?>">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                                <a class="text-link text-primary" href="#" title="Hapus" data-toggle="modal" data-target="#editModal<?= $p->id; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="text-link text-danger" href="#" title="Hapus" data-toggle="modal" data-target="#hapusModal<?= $p->id; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal<?= $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('admin/penyewa/edit/' . $p->id); ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="nama">Nama</label>
                                                                <input type="nama" class="form-control" name="nama" placeholder="Masukkan Nama Penyewa" value="<?= $p->nama; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat</label>
                                                                <input type="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat Penyewa" value="<?= $p->alamat; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" name="email" placeholder="Masukkan Email Penyewa" value="<?= $p->email; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="no_telp">Nomor Telpon</label>
                                                                <input type="no_telp" class="form-control" name="no_telp" placeholder="Masukkan Nomor Telpon Penyewa" value="<?= $p->no_telp; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="media_sosial">Media Sosial</label>
                                                                <input type="media_sosial" class="form-control" name="media_sosial" placeholder="Masukkan Media Sosial Penyewa" value="<?= $p->media_sosial; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                                <div class="input-group mb-3">
                                                                    <select class="custom-select" name="jenis_kelamin">
                                                                        <option disabled>Pilih Jenis Kelamin Penyewa</option>
                                                                        <option value="Laki-laki" <?= $p->jenis_kelamin == "Laki-laki" ? "selected" : ""; ?>>Laki-laki</option>
                                                                        <option value="Perempuan" <?= $p->jenis_kelamin == "Perempuan" ? "selected" : ""; ?>>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Edit Modal -->
                                        <!-- Detail Modal -->
                                        <div class="modal fade" id="detailModal<?= $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title; ?></h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('admin/penyewa/destroy/' . $p->id); ?>" method="post">
                                                            <div>
                                                                <h6>Nama : <?= $p->nama; ?></h6>
                                                            </div>
                                                            <div>
                                                                <h6>Alamat : <?= $p->alamat; ?></h6>
                                                            </div>
                                                            <div>
                                                                <h6>Email : <?= $p->email; ?></h6>
                                                            </div>
                                                            <div>
                                                                <h6>Nomor Telpon : <?= $p->no_telp; ?></h6>
                                                            </div>
                                                            <div>
                                                                <h6>Media Social : <?= $p->media_sosial; ?></h6>
                                                            </div>
                                                            <div>
                                                                <h6>Jenis Kelamin : <?= $p->jenis_kelamin; ?></h6>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Lihat Lokasi Penyewa</button>
                                                                <button type="submit" class="btn btn-success">Hubungi Penyewa</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Detail Modal -->

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="hapusModal<?= $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Apakah anda yakin ingin menghapus data penyewa ini?</h3>
                                                        <form action="<?php echo base_url('admin/penyewa/destroy/' . $p->id); ?>" method="post">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Delete Modal -->
                                    <?php } ?>
                                </tbody>

                            </table>
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

        <!-- Add Modal -->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('admin/penyewa/save'); ?>" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="nama" class="form-control" name="nama" placeholder="Masukkan Nama Penyewa">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat Penyewa">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukkan Email Penyewa">
                            </div>
                            <div class="form-group">
                                <label for="no_telp">Nomor Telpon</label>
                                <input type="no_telp" class="form-control" name="no_telp" placeholder="Masukkan Nomor Telpon Penyewa">
                            </div>
                            <div class="form-group">
                                <label for="media_sosial">Media Sosial</label>
                                <input type="media_sosial" class="form-control" name="media_sosial" placeholder="Masukkan Media Sosial Penyewa">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="jenis_kelamin">
                                        <option selected disabled>Pilih Jenis Kelamin Penyewa</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Add Modal -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper