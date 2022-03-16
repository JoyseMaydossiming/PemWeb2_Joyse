<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="card-header">Sistem Penilaian</div>
  <div class="card-body"><h5>Form Penilaian</h5></div>
  <div class="container justify-content-center pt-5 pb-5">
    <form class="form-horizontal" action="nilai_siswa.php" method="POST">
      <div class="form-group row">
        <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
        <div class="col-8">
          <input id="nama" name="nama" placeholder="Nama Lengkap" type="text" size="30" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label> 
        <div class="col-8">
          <select name="matkul" class="custom-select">
            <option value="DDP">Dassar-Dasar Pemrograman</option>
            <option value="BDI">Basis Data I</option>
            <option value="WEB1">Pemrograman Web</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="uts" class="col-4 col-form-label">Nilai UTS</label> 
        <div class="col-4">
          <input id="uts" name="nilai_uts" placeholder="Nilai UTS" type="text" size="6" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="uas" class="col-4 col-form-label">Nilai UAS</label> 
        <div class="col-4">
          <input id="uas" name="nilai_uas" placeholder="Nilai UAS" type="text" size="6" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="tugas" class="col-4 col-form-label">Nilai Tugas/Praktikum</label> 
        <div class="col-4">
          <input id="tugas" name="nilai_tugas" placeholder="Nilai Tugas" type="text" size="6" class="form-control">
        </div>
      </div> 
      <div class="form-group row">
        <div class="offset-4 col-1">
          <!-- <button name="proses" type="submit" class="btn btn-primary">Submit</button> -->
          <input type="submit" value="Simpan" name="proses"  class="btn btn-primary">
        </div>
      </div>
    </form>
  </div>
  <?php
  require_once 'libfungsi.php';

    $proses = isset($_POST['proses']) ? $_POST['proses'] : '';
    $nama_siswa = isset($_POST['nama']) ? $_POST['nama'] : '';
    $mata_kuliah = isset($_POST['matkul']) ? $_POST['matkul'] : '';
    $nilai_uts = isset($_POST['nilai_uts']) ? $_POST['nilai_uts'] : '';
    $nilai_uas = isset( $_POST['nilai_uas']) ? $_POST['nilai_uas'] : '';
    $nilai_tugas = isset($_POST['nilai_tugas']) ? $_POST['nilai_tugas'] : '';

    if(!empty($proses)){
      echo'Proses : ' .$proses;
      echo'<br/>Nama Lengkap : '.$nama_siswa;
      echo'<br/>Mata Kuliah : '.$mata_kuliah;
      echo'<br/>Nilai UTS : '.$nilai_uts;
      echo'<br/>Nilai UAS : '.$nilai_uas;
      echo'<br/>Nilai Tugas/Praktikum : '.$nilai_tugas;

      $nilai_akhir = presentase($nilai_uts, $nilai_uts, $nilai_tugas);
      $grade_nilai = grade($nilai_akhir);

      echo '<br/> Presentase Nilai : ' . $nilai_akhir .'%';
      echo '<br/> Status DINYATAKAN : ' . kelulusan($nilai_akhir);
      echo '<br/> Grade : '. $grade_nilai .predikat($grade_nilai);
    }

    ?>
  <div class="card-footer text-muted">Develop By @Joyse Maydossiming</div>
</body>
</html>