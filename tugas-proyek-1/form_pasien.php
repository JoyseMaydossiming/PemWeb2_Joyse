<?php

include('templates/head.php');

include('templates/sidebar.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tugas Proyek 1</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kalulator BMI</li>
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
                <h3 class="card-title">Aplikasi Menghitung BMI</h3>

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


                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Masukan Body Mass Index(BMI)</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="data_pasien.php" method="post" class="form-horizontal">

                        <input type="hidden" name="tanggal" value="<?php echo date("d-m-Y"); ?>">

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tmp_Lahir" class="form-control" placeholder="Masukan Tempat Lahir">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tgl_Lahir" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="Masukan Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Berat Badan</label>
                                <div class="col-sm-10">
                                    <input type="float" name="berat" class="form-control" placeholder="Masukan Berat Badan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tinggi Badan</label>
                                <div class="col-sm-10">
                                    <input type="number" name="tinggi" class="form-control" placeholder="Masukan Tinggi Badan">
                                </div>
                            </div>

                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="pria" name="gender" value="Pria">
                                        <label for="pria">Pria
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="wanita" name="gender" value="Wanita">
                                        <label for="wanita">Wanita
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Kirim</button>
                            <button type="reset" class="btn btn-default float-right">Reset</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include('templates/footer.php');

?>