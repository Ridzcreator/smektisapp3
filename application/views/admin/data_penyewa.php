<!-- Content Wrapper. Contains page content -->
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
                                        <th>Nama Penyewa</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th>Jaminan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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