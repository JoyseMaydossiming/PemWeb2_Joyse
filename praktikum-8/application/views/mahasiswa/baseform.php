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
                <?php echo form_open('mahasiswa/save', '', ['isEdit' => str_contains($judul, 'Edit')]) ?>
                <div class="form-group row">
                    <label for="nim" class="col-4 col-form-label">NIM</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-address-card"></i>
                                </div>
                            </div>
                            <input id="nim" value="<?= isset($mhs->nim) ? $mhs->nim : '' ?>" name="nim" type="text" class="form-control">
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
                            <input value="<?= isset($mhs->nama) ? $mhs->nama : '' ?>" id="name" name="name" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">Jenis Kelamin</label>
                    <div class="col-8">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="jk" id="jk_0" type="radio" class="custom-control-input" value="L" <?= isset($mhs->gender) && $mhs->gender == 'L' ? 'checked' : '' ?>>
                            <label for="jk_0" class="custom-control-label">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="jk" id="jk_1" type="radio" class="custom-control-input" value="P" <?= isset($mhs->gender) && $mhs->gender == 'P' ? 'checked' : '' ?>>
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
                            <input value="<?= isset($mhs->tmp_lahir) ? $mhs->tmp_lahir : '' ?>" id="tmp_lahir" name="tmp_lahir" type="text" class="form-control">
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
                            <input value="<?= isset($mhs->tgl_lahir) ? $mhs->tgl_lahir : '' ?>" id="tgl_lahir" name="tgl_lahir" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prodi" class="col-4 col-form-label">Program Studi</label>
                    <div class="col-8">
                        <select id="prodi" name="prodi" class="custom-select">
                            <option value="SI" <?= isset($mhs->prodi_kode) && $mhs->prodi_kode == 'SI' ? 'selected' : '' ?>>Sistem Informasi</option>
                            <option value="TI" <?= isset($mhs->prodi_kode) && $mhs->prodi_kode == 'TI' ? 'selected' : '' ?>>Teknik Informatika</option>
                            <option value="BD" <?= isset($mhs->prodi_kode) && $mhs->prodi_kode == 'BD' ? 'selected' : '' ?>>Bisnis Digital</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ipk" class="col-4 col-form-label">Indeks Prestasi</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-adjust"></i>
                                </div>
                            </div>
                            <input id="ipk" name="ipk" value="<?= isset($mhs->ipk) ? $mhs->ipk : '' ?>" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <a href="<?= base_url() ?>index.php/mahasiswa" type="button" class="btn btn-secondary">
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