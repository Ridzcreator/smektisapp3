<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fa fa-address-card text-primary"></i> Data Transaksi</h1>
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
                                                $transaksi_barang[$no-1] = [];
                                                foreach ($barang_pinjam as $b) {
                                                    if ($b->t_id == $data->t_id) {
                                                        array_push($transaksi_barang[$no-1], $b->nama);
                                                    }
                                                }
                                                echo implode(', ', $transaksi_barang[$no-1]);
                                                 ?>
                                            </td>
                                            <td><?= date("d/m/Y H:i:s", strtotime($data->tanggal_pinjam)); ?></td>
                                            <td><?= date("d/m/Y H:i:s", strtotime('+' . ($data->durasi * 24) . ' hours', strtotime($data->tanggal_pinjam))); ?></td>
                                            <td><?= $data->status_nama; ?></td>
                                            <td><?= $data->alamat; ?></td>
                                            <td class="d-flex justify-content-between">
                                                <a class="text-link text-primary" href="#" title="Detail">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                                <a class="text-link text-success" href="#" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="text-link text-danger" href="#" title="Hapus">
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

        <!-- Modal -->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('admin/transaksi/store'); ?>" method="post">
                            <div class="form-group">
                                <label for="penyewa_id">Penyewa ID</label>
                                <input type="number" class="form-control" name="penyewa_id" placeholder="Masukkan nama penyewa_id">
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori Barang</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="kategori_id" id="inputGroupSelect01" onchange="pilihKategori(this)">
                                        <option selected disabled value="">Pilih Kategori Barang</option>
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
                            <div class="form-group">
                                <label for="barang_id">Pilih Barang</label>
                                <div class="input-group mb-3" id="pilihanBarang">
                                    <select class='custom-select' name='barang_id' id='inputGroupSelect01'>
                                        <option selected disabled value=''>Pilih Barang Sewa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <div class="input-group">
                                    <input type="datetime-local" class="form-control" name="tanggal_pinjam">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="durasi">Durasi (hari)</label>
                                <input type="number" class="form-control" name="durasi" placeholder="Masukkan durasi">
                            </div>
                            <div class="form-group">
                                <label for="status_id">Pilih Status</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="status_id" id="inputGroupSelect01">
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
                                <input type="nama" class="form-control" name="jaminan" placeholder="Masukkan jaminan (contoh: KTP,BPJS)">
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    function pilihKategori(object) {
        if (object.value) {
            this.cetakPilihanBarang(object.value);
        }
    }

    function cetakPilihanBarang(kategori) {
        <?php 
        echo "var barang = " . json_encode($master_barang) . ";";
         ?>

        var pilihan = "<select class='custom-select' id='inputGroupSelect01'><option selected disabled value=''>Pilih Barang Sewa</option>";

        barang.forEach( function(element) {
            if (element.kategori_id == kategori) {
                pilihan += "<option value='" + element.id + "'>" + element.nama + "</option>";
            }
        });

        pilihan += "</select>";

        document.getElementById("pilihanBarang").innerHTML = pilihan;
    }
</script>