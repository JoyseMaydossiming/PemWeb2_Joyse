<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Mahasiswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Mahasiswa</h3>

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
                    <a href="mahasiswa/create" type="button" class="btn btn-primary btn-md">
                        <i class="fas fa-plus m-1"></i>Tambah
                    </a>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Prodi</th>
                            <th>Indeks Prestasi</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($list_mahasiswa as $mhs) {
                        ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $mhs->nim ?></td>
                                <td><?= $mhs->nama ?></td>
                                <td><?= $mhs->gender ?></td>
                                <td><?= $mhs->tmp_lahir ?></td>
                                <td><?= $mhs->tgl_lahir ?></td>
                                <td><?= $mhs->prodi_kode ?></td>
                                <td><?= $mhs->ipk ?></td>
                                <td> <a href="mahasiswa/view?id=<?= $mhs->nim ?>" type="button" class="btn btn-primary btn-xs">
                                        <i class="fas fa-eye"></i> View
                                    </a> &nbsp;<a href="mahasiswa/update?id=<?= $mhs->nim ?>" type="button" class="btn btn-warning btn-xs">
                                        <i class="fas fa-pen"></i> Update
                                    </a> &nbsp;<a href="mahasiswa/delete?id=<?= $mhs->nim ?>" type="button" class="btn btn-danger btn-xs">
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