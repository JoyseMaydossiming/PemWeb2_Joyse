<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Mahasiswa</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <table class="table table-striped">
                            <tr>
                                <td>NIDN</td>
                                <td><?= $dsn->nidn ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?= $dsn->nama ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td> <?= $dsn->gender ?></td>
                            </tr>
                            <tr>
                                <td>Tempat & Tanggal Lahir</td>
                                <td> <?= $dsn->tmp_lahir ?>, <?= $dsn->tgl_lahir ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Terakhir</td>
                                <td> <?= $dsn->pendidikan_akhir ?></td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td> <?= $dsn->prodi_kode ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-4">
                        <h5>Ini Foto</h5>
                    </div>
                </div>
                <a href="<?= base_url() ?>index.php/dosen" type="button" class="btn btn-secondary btn-md">
                    Kembali
                </a>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>