<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 2</title>
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
    $proses = $_POST['proses'];
    $nama_siswa = $_POST['nama'];
    $mata_kuliah = $_POST['matkul'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];
    $nilai_tugas = $_POST['nilai_tugas'];

    if(!empty($proses)){
      echo'Proses : ' .$proses;
      echo'<br/>Nama Lengkap : '.$nama_siswa;
      echo'<br/>Mata Kuliah : '.$mata_kuliah;
      echo'<br/>Nilai UTS : '.$nilai_uts;
      echo'<br/>Nilai UAS : '.$nilai_uas;
      echo'<br/>Nilai Tugas/Praktikum : '.$nilai_tugas;
    }

    $persentase = ceil(($nilai_uts*30/100) + ($nilai_uas*35/100) + ($nilai_tugas*35/100));
    echo '<br/> Presentase Nilai : ' .$persentase .'%';

    if($persentase > 55){
      echo '<br/>'.$nama_siswa.' Dinyatakan LULUS';
    } else{
      echo '<br/>'.$nama_siswa.' Dinyatakan TIDAK LULUS';
    }

    if ($persentase == "") {
        echo "";
    } else if ($persentase >= 0 && $persentase <= 35) {
        echo '<br/>Grade Nilai : E';
    } else if ($persentase >= 36 && $persentase <= 55) {
        echo '<br/>Grade Nilai : D';
    } else if ($persentase >= 56 && $persentase <= 69) {
        echo '<br/>Grade Nilai : C';
    } else if ($persentase >= 70 && $persentase <= 84) {
        echo '<br/>Grade Nilai : B';
    } else if ($persentase >= 85 && $persentase <= 100) {
        echo '<br/>Grade Nilai : A';
    } else {
      echo '<br/>Grade Nilai : I';
    }

    switch (true)
    {
      case ($persentase >= 85) :
        echo ' Sangat Memuaskan<br/>';
        break;
      case ($persentase < 85 && $persentase >= 70) :
        echo 'Memuaskan<br/>';
        break;
      case ($persentase < 70 && $persentase >=  56) :
        echo 'Cukup<br/>';
        break;
      case ($persentase < 56 && $persentase >=  36) :
        echo 'Kurang<br/>';
        break;
      case ($persentase < 36 && $persentase >=  0) :
        echo 'Sangat Kurang<br/>';
        break;
      default : 
        echo 'Tidak Ada';
    }
    ?>
  <div class="card-footer text-muted">Develop By @Joyse Maydossiming</div>
</body>
</html>