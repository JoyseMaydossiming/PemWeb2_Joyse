<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>
        Daftar Dosen
    </h3>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Pendidikan</th>
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
                    <td><?= $dsn->tgl_lahir ?></td>
                    <td><?= $dsn->tmp_lahir ?></td>
                    <td><?= $dsn->pendidikan ?></td>
                </tr>
            <?php
                $nomor++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>