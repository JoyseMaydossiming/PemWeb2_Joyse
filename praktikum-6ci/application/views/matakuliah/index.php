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
        Daftar Mata Kuliah
    </h3>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            foreach ($all_mk as $mk) {
            ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $mk->kode ?></td>
                    <td><?= $mk->nama ?></td>
                    <td><?= $mk->sks ?></td>
                </tr>
            <?php
                $nomor++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>