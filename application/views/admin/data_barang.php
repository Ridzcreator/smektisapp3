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
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="penyewa">Nama Barang</label>
                                <input type="nama" class="form-control" id="nama" placeholder="Masukkan Nama Barang">
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="penyewa">Harga Barang</label>
                                <input type="nama" class="form-control" id="nama" placeholder="Masukkan Harga Sewa Barang">
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="penyewa">Stok Barang</label>
                                <input type="nama" class="form-control" id="nama" placeholder="Masukkan Jumblah Barang">
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="penyewa">Kategori Barang</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Pilih Kategori Barang</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Tambah Foto Barang</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Pilih Foto</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="" method="post">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Keterangan Barang</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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