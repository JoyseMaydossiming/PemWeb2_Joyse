<?php
require_once "bank.php";
    $ahmad = new Account('C001','Ahmad',6000000);
    $budi = new Account('C002','Budi',5350000);
    $kurniawan = new Account('C003','Kurniawan',2500000);
    $data = [$ahmad, $budi , $kurniawan];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar  Account Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
</head>
<body>
    <h3>Daftar Account Bank</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>No.Account</th>
                <th>Pemilik</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $ahmad->deposit(1000000);
        $ahmad->customerTransfer($kurniawan, 1500000);
        $ahmad->customerTransfer($budi, 500000);
        $budi->withdraw(2500000);
        $nomor = 1;
        foreach($data as $account){
            ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $account->nomor; ?></td>
                <td><?= $account->name; ?></td>
                <td><?= $account->cetak(); ?></td>
            </tr>
            <?php
        $nomor++;
        }
        ?>
        </tbody>
    </table>
    <h3>Data Terbaru</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>No.Account</th>
                <th>Pemilik</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
        $nomor = 1;
        foreach($data as $account){
            ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $account->nomor; ?></td>
                <td><?= $account->name; ?></td>
                <td><?= $account->cetak(); ?></td>
            </tr>
            <?php
        $nomor++;
        }
        ?>
        </tbody>
    </table>
</body>
</html>