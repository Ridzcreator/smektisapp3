<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fa fa-home text-primary"></i> Dashboard</h1>
                    <!-- <h1 class="nav-icon fa fa-home text-primary"> Dashboard</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <?php 
                $color = [
                    'bg-info',
                    'bg-success',
                    'bg-warning',
                    'bg-danger',
                ];
                $color_index = 0;
                foreach ($kategoris as $kategori): ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box <?= $color[$color_index++]; ?>">
                            <div class="inner">
                                <h3><?= $kategori->total; ?></h3>

                                <p><?= $kategori->nama; ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a class="small-box-footer">Jumlah Transaksi 
                                <!-- <i class="fas fa-arrow-circle-right"></i> -->
                            </a>
                        </div>
                    </div>
                <?php 
                $color_index = $color_index > 3 ? 0 : $color_index;
                endforeach ?>
                <!-- ./col -->
            </div>

            <!-- BAR CHART -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Jumlah Transaksi</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.content-wrapper -->
        </div>
    </section>
</div>