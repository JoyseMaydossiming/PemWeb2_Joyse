<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List dosen</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>

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
                <?php echo form_open('dosen/save', '', ['isEdit' => str_contains($judul, 'Edit')]) ?>
                <div class="form-group row">
                    <label for="nidn" class="col-4 col-form-label">NIDN</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-address-card"></i>
                                </div>
                            </div>
                            <input id="nidn" value="<?= isset($dsn->nidn) ? $dsn->nidn : '' ?>" name="nidn" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-4 col-form-label">Nama Lengkap</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-address-book"></i>
                                </div>
                            </div>
                            <input value="<?= isset($dsn->nama) ? $dsn->nama : '' ?>" id="name" name="name" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">Jenis Kelamin</label>
                    <div class="col-8">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="jk" id="jk_0" type="radio" class="custom-control-input" value="L" <?= isset($dsn->gender) && $dsn->gender == 'L' ? 'checked' : '' ?>>
                            <label for="jk_0" class="custom-control-label">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="jk" id="jk_1" type="radio" class="custom-control-input" value="P" <?= isset($dsn->gender) && $dsn->gender == 'P' ? 'checked' : '' ?>>
                            <label for="jk_1" class="custom-control-label">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-anchor"></i>
                                </div>
                            </div>
                            <input value="<?= isset($dsn->tmp_lahir) ? $dsn->tmp_lahir : '' ?>" id="tmp_lahir" name="tmp_lahir" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            <input value="<?= isset($dsn->tgl_lahir) ? $dsn->tgl_lahir : '' ?>" id="tgl_lahir" name="tgl_lahir" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pendidikan_akhir" class="col-4 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-8">
                        <select id="pendidikan_akhir" name="pendidikan_akhir" class="custom-select">
                            <option <?= isset($dsn->pendidikan_akhir) && $dsn->pendidikan_akhir == 'S1' ? 'selected' : '' ?> value="S1">S1</option>
                            <option <?= isset($dsn->pendidikan_akhir) && $dsn->pendidikan_akhir == 'S2' ? 'selected' : '' ?> value="S2">S2</option>
                            <option <?= isset($dsn->pendidikan_akhir) && $dsn->pendidikan_akhir == 'S3' ? 'selected' : '' ?> value="S3">S3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prodi" class="col-4 col-form-label">Program Studi</label>
                    <div class="col-8">
                        <select id="prodi" name="prodi" class="custom-select">
                            <option value="SI" <?= isset($dsn->prodi_kode) && $dsn->prodi_kode == 'SI' ? 'selected' : '' ?>>Sistim Informasi</option>
                            <option value="TI" <?= isset($dsn->prodi_kode) && $dsn->prodi_kode == 'TI' ? 'selected' : '' ?>>Teknik Informatika</option>
                            <option value="BD" <?= isset($dsn->prodi_kode) && $dsn->prodi_kode == 'BD' ? 'selected' : '' ?>>Bisnis Digital</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <a href="<?= base_url() ?>index.php/dosen" type="button" class="btn btn-secondary">
                            Kembali
                        </a>
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <? echo form_close() ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>