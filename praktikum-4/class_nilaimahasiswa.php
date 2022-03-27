<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 4</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="card-header">Praktikum 4</div>
  <div class="card-body"><h5>Form Nilai Ujian</h5></div>
  <div class="container justify-content-center pt-5 pb-5">
    <form class="form-horizontal" action="class_nilaimahasiswa.php" method="POST">
      <div class="form-group row">
        <label for="nim" class="col-4 col-form-label">NIM</label> 
        <div class="col-8">
          <input id="nim" name="nim" placeholder="NIM" type="text" class="form-control">
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
        <label for="uts" class="col-4 col-form-label">Nilai</label> 
        <div class="col-4">
          <input id="uts" name="nilai" placeholder="Nilai" type="text" size="6" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-4 col-1">
          <input type="submit" value="Simpan" name="proses"  class="btn btn-success">
        </div>
      </div>
    </form>
  </div>
  <?php
    include "class_mahasiswa.php";

    $proses = isset($_POST['proses']) ? $_POST['proses'] : '';
    $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
    $matkul = isset($_POST['matkul']) ? $_POST['matkul'] : '';
    $nilai = isset($_POST['nilai']) ? $_POST['nilai'] : '';

    if(!empty($proses)){
      echo'Proses : ' .$proses;
      echo'<br/>NIM : '.$nim;
      echo'<br/>Mata Kuliah : '.$matkul;
      echo'<br/>Nilai : '.$nilai;

      $nim=$_POST["nim"];
      $matkul=$_POST["matkul"];
      $nilai=$_POST["nilai"];	

      $mahasiswa=new NilaiMahasiswa($matkul, $nilai, $nim);

      echo "<br/>Hasil : ". $mahasiswa->hasil($nilai);
      echo "<br/>Grade : ". $mahasiswa->grade($nilai);
    }
    ?>
  <div class="card-footer text-muted">Develop By @Joyse Maydossiming</div>
</body>
</html>