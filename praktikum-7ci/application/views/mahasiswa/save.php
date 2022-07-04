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
                <h3 class="card-title">
                    Detail Mahasiswa
                </h3>

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
                NIM : <?= $mahasiswa->nim ?> <br />
                Nama Lengkap : <?= $mahasiswa->nama ?> <br />
                Jenis Kelamin : <?= $mahasiswa->gender ?> <br />
                Tempat Lahir : <?= $mahasiswa->tmp_lahir ?> <br />
                Tanggal Lahir : <?= $mahasiswa->tgl_lahir ?> <br />
                Program Studi : <?= $mahasiswa->prodi ?> <br />
                Indeks Prestasi : <?= $mahasiswa->ipk ?> <br />
                Predikat : <?= $mahasiswa->predikat() ?> <br />
            </div>
            <a href="<?= base_url() ?>mahasiswa" type="button" class="btn btn-secondary btn-md">
                Kembali
            </a>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>