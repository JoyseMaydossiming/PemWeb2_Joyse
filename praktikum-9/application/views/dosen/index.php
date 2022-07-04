<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Dosen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Dosen</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Dosen</h3>

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
                <table class="table table-striped">
                    <a href="dosen/create" type="button" class="btn btn-primary btn-md">
                        <i class="fas fa-plus m-1"></i>Tambah
                    </a>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Prodi</th>
                            <th>Pendidikan Akhir</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($all_dosen as $dsn) {
                        ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $dsn->nidn ?></td>
                                <td><?= $dsn->nama ?></td>
                                <td><?= $dsn->gender ?></td>
                                <td><?= $dsn->tmp_lahir ?></td>
                                <td><?= $dsn->tgl_lahir ?></td>
                                <td><?= $dsn->prodi_kode ?></td>
                                <td><?= $dsn->pendidikan_akhir ?></td>
                                <td> <a href="dosen/view?id=<?= $dsn->nidn ?>" type="button" class="btn btn-primary btn-xs">
                                        <i class="fas fa-eye"></i> View
                                    </a> &nbsp;<a href="dosen/update?id=<?= $dsn->nidn ?>" type="button" class="btn btn-warning btn-xs">
                                        <i class="fas fa-pen"></i> Update
                                    </a> &nbsp;<a href="dosen/delete?id=<?= $dsn->nidn ?>" type="button" class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash"></i> Delete
                                    </a></td>
                            </tr>
                        <?php
                            $nomor++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>