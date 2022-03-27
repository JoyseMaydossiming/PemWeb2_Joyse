<?php
require_once "class_mahasiswa.php";
    $ns1 = new Mahasiswa('02011','Faiz Fikri','TI',2012,3.8);
    $ns2 = new Mahasiswa('02012','Alissa Khairunnisa','TI',2012,3.9);
    $ns3 = new Mahasiswa('01011','Rosalie Nasurah','SI',2010,3.46);
    $ns4 = new Mahasiswa('01012','defghi Muhammad','SI',2010,3.2);
    $data = [$ns1, $ns2 , $ns3, $ns4];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
</head>
<body>
    <h3>Daftar Mahasiswa</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Tahun Angkatan</th>
                <th>IPK</th>
                <th>Predikat</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $nomor = 1;
        foreach($data as $mahasiswa){
            ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $mahasiswa->nim; ?></td>
                <td><?= $mahasiswa->nama; ?></td>
                <td><?= $mahasiswa->prodi; ?></td>
                <td><?= $mahasiswa->thn_angkatan; ?></td>
                <td><?= $mahasiswa->ipk; ?></td>
                <td><?= $mahasiswa->predikat_ipk(); ?></td>
            </tr>
            <?php
        $nomor++;
        }
        ?>
        </tbody>
    </table>
</body>
</html>