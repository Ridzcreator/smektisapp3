<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fa fa-address-card text-primary"></i> Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus-circle"></i> Tambah Barang</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal2"><i class="fa fa-plus-circle"></i> Tambah Kategori Barang</button>
                            <!-- <h3 class="card-title" style="width: 100%;"><marquee behavior="" direction="left">Ini info terbaru</marquee></h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="barang_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($barang as $b) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $b->nama_barang; ?></td>
                                            <td><?= $b->harga; ?></td>
                                            <td>
                                                <a href="#" style="<?php echo (isset($b->status) && $b->status < 1) ? 'color: red;' : 'color: black;'; ?>" title="<?php echo 'Tersedia ' . (isset($b->status) ? $b->status : $b->stok); ?>">
                                                    <?= $b->stok; ?>
                                                </a>
                                            </td>
                                            <td><?= $b->kategori_nama; ?></td>
                                            <td><?= $b->keterangan; ?></td>
                                            <td></td>
                                            <td class="d-flex justify-content-between">
                                                <a class="text-link text-success" href="#" title="Edit" data-toggle="modal" data-target="#editModal">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="text-link text-danger" href="#" title="Hapus" data-toggle="modal" data-target="#hapusModal">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>

                                        </tr>

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
                        <form action="<?php echo base_url('admin/barang/tambahbarang'); ?>" method="post">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan jaminan (contoh: KTP,BPJS)">
                            </div>
                            <div class="form-group">
                                <label for="penyewa">Harga Barang</label>
                                <input type="nama" class="form-control" name="harga_barang" placeholder="Masukkan Harga Sewa Barang">
                            </div>
                            <div class="form-group">
                                <label for="penyewa">Stok Barang</label>
                                <input type="nama" class="form-control" name="stok_barang" placeholder="Masukkan Jumblah Barang">
                            </div>
                            <div class="form-group">
                                <label for="kategori_barang">Kategori Barang</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="kategori_id" id="inputGroupSelect01">
                                        <option selected>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Tambah Foto Barang</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Pilih Foto</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Keterangan Barang</label>
                                    <textarea class="form-control" name="keterangan_barang" id="exampleFormControlTextarea1" rows="3"></textarea>
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
        <!-- Tambah Kategori Modal  -->
        <div class="modal fade" id="tambahModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('admin/barang/tambahkategoribarang'); ?>" method="post">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan jaminan (contoh: KTP,BPJS)">
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
        <!-- end modal kategori -->

        <!-- Delete Modal -->
        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus transaksi ini?</h3>
                        <form action="<?php echo base_url('admin/barang/destroy/'); ?>" method="post">
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->