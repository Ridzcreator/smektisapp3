<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fa fa-cart-plus text-primary"></i> Data Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Transaksi</li>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus-circle"></i> Tambah Transaksi</button>
                            <!-- <h3 class="card-title" style="width: 100%;"><marquee behavior="" direction="left">Ini info terbaru</marquee></h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Barang Dipinjam</th>
                                        <th>Tanggal Sewa/Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($transaksi as $data) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
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
                                                ?>
                                            </td>
                                            <td><?= date("d/m/Y H:i:s", strtotime($data->tanggal_pinjam)); ?></td>
                                            <td><?= date("d/m/Y H:i:s", strtotime('+' . ($data->durasi * 24) . ' hours', strtotime($data->tanggal_pinjam))); ?></td>
                                            <td><?= $data->status_nama; ?></td>
                                            <td><?= $data->alamat; ?></td>
                                            <td class="d-flex justify-content-between">
                                                <a class="text-link text-dark" href="<?php echo base_url('admin/transaksi/nota/' . $data->t_id); ?>" title="Print" target="_blank">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                                <a class="text-link text-primary" href="#" title="Edit" data-toggle="modal" data-target="#editModal<?= $data->t_id; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="text-link text-danger" href="#" title="Hapus" data-toggle="modal" data-target="#hapusModal<?= $data->t_id; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a class="text-link text-success" href="#" title="Selesaikan transaksi" data-toggle="modal" data-target="#selesaiModal<?= $data->t_id; ?>">
                                                    <i class="fa fa-check-square"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal<?= $data->t_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $title; ?></h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('admin/transaksi/edit/' . $data->t_id); ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="penyewa_id">Penyewa</label>
                                                                <div class="input-group mb-3">
                                                                    <select class="custom-select" name="penyewa_id<?= $data->t_id; ?>" id="inputGroupSelect01">
                                                                        <option selected disabled value="">Pilih Penyewa</option>
                                                                        <?php
                                                                        foreach ($master_penyewa as $penyewa) {
                                                                        ?>
                                                                            <option value="<?= $penyewa->id; ?>" <?= $data->penyewa_id == $penyewa->id ? 'selected' : ''; ?>><?= $penyewa->nama; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="durasi">Durasi (hari)</label>
                                                                <input type="number" class="form-control" name="durasi<?= $data->t_id; ?>" placeholder="Masukkan durasi" value="<?= $data->durasi; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="status_id">Status</label>
                                                                <div class="input-group mb-3">
                                                                    <select class="custom-select" name="status_id<?= $data->t_id; ?>" id="inputGroupSelect01">
                                                                        <option selected disabled value="">Pilih Status Transaksi</option>
                                                                        <?php
                                                                        foreach ($master_status as $status) {
                                                                        ?>
                                                                            <option value="<?= $status->id; ?>" <?= $data->status_id == $status->id ? 'selected' : ''; ?>><?= $status->nama; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jaminan">Jaminan</label>
                                                                <input type="text" class="form-control" name="jaminan<?= $data->t_id; ?>" placeholder="Masukkan jaminan (contoh: KTP,BPJS)" value="<?= $data->jaminan; ?>">
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

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="hapusModal<?= $data->t_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Apakah anda yakin ingin menghapus transaksi ini?</h3>
                                                        <form action="<?php echo base_url('admin/transaksi/destroy/' . $data->t_id); ?>" method="post">
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

                                        <!-- Selesai Modal -->
                                        <div class="modal fade" id="selesaiModal<?= $data->t_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Selesaikan <?= $title; ?></h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Apakah anda yakin ingin menyelesaikan transaksi ini?</h3>
                                                        <form action="<?php echo base_url('admin/transaksi/selesai/' . $data->t_id); ?>" method="post">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-success">Selesai</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Selesai Modal -->
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
                        <form action="<?php echo base_url('admin/transaksi/store'); ?>" method="post">
                            <div class="form-group">
                                <label for="penyewa_id">Penyewa</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="penyewa_id" id="inputGroupSelect01" required>
                                        <option selected disabled value="">Pilih Penyewa</option>
                                        <?php
                                        foreach ($master_penyewa as $penyewa) {
                                        ?>
                                            <option value="<?= $penyewa->id; ?>"><?= $penyewa->nama; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori Barang</label>
                                <div class="input-group mb-3">
                                    <select class="select2" name="kategori_ids[]" multiple="multiple" data-placeholder="Pilih Kategori Barang" id="pilihanKategori" style="width: 100%;" onchange="pilihKategori()" required>
                                        <?php
                                        foreach ($master_kategori as $kategori) {
                                        ?>
                                            <option value="<?= $kategori->id; ?>"><?= $kategori->nama; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="formPilihBarang" style="display: none;">
                                <label>Barang Sewa</label>
                                <select class="select2" name="barang_pinjam_ids[]" multiple="multiple" data-placeholder="Pilih Barang Sewa" style="width: 100%;" id="pilihanBarangSewa" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <div class="input-group">
                                    <input type="datetime-local" class="form-control" name="tanggal_pinjam" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="durasi">Durasi (hari)</label>
                                <input type="number" class="form-control" name="durasi" placeholder="Masukkan durasi" required>
                            </div>
                            <div class="form-group">
                                <label for="status_id">Status</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="status_id" id="inputGroupSelect01" required>
                                        <option selected disabled value="">Pilih Status Transaksi</option>
                                        <?php
                                        foreach ($master_status as $status) {
                                        ?>
                                            <option value="<?= $status->id; ?>"><?= $status->nama; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jaminan">Jaminan</label>
                                <input type="text" class="form-control" name="jaminan" placeholder="Masukkan jaminan (contoh: KTP,BPJS)" required>
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
<!-- /.content-wrapper -->
<script type="text/javascript">
    var kategori = [];
    var barang = {};

    function pilihKategori() {
        if (this.kategori = $("#pilihanKategori").val()) {
            this.cetakPilihanBarang();
            document.getElementById("formPilihBarang").style.display = "block";
        }
    }

    function cetakPilihanBarang() {
        <?php
        echo "this.barang = " . json_encode($master_barang) . ";";
        ?>

        var pilihan = '';
        var counter = 0;

        this.barang.forEach(function(element) {
            if (this.kategori.includes(element.kategori_id) && ((element.status && element.status > 0) || !element.status)) {
                counter = element.status ? element.status : element.stok;
                for (let i = 0; i < counter; i++) {
                    pilihan += "<option value='" + element.id + "'>" + element.nama + "</option>";
                }
            }
        });

        document.getElementById("pilihanBarangSewa").innerHTML = pilihan;
    }
</script>