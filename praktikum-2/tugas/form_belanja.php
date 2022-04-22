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
  <div class="container pt-5">
    <div class="row">
      <div class="col-8 float-start">
        <h5>Belanja Online</h5>
        <form action="form_belanja.php" method="POST">
          <div class="form-group row">
            <label for="cust" class="col-4 col-form-label">Customer</label> 
            <div class="col-8">
              <input id="cust" name="customer" placeholder="Nama Customer" type="text" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-4">Pilih Produk</label> 
            <div class="col-8">
              <div class="custom-control custom-radio custom-control-inline">
                <input name="produk" id="produk_0" type="radio" class="custom-control-input" value="TV"> 
                <label for="produk_0" class="custom-control-label">TV</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input name="produk" id="produk_1" type="radio" class="custom-control-input" value="Kulkas"> 
                <label for="produk_1" class="custom-control-label">Kulkas</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input name="produk" id="produk_2" type="radio" class="custom-control-input" value="Mesin Cuci"> 
                <label for="produk_2" class="custom-control-label">Mesin Cuci</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="jumlah" class="col-4 col-form-label">Jumlah</label> 
            <div class="col-8">
              <input id="jumlah" name="jumlah" placeholder="Jumlah" type="text" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-4 col-1">
              <!-- <button name="proses" type="submit" class="btn btn-primary">Submit</button> -->
              <input type="submit" value="Kirim" name="proses"  class="btn btn-success">
            </div>
          </div>
        </form>
      </div>
      <div class="col-4 float-end">
        <div class="list-group">
          <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
            Daftar Harga
          </button>
          <button type="button" class="list-group-item list-group-item-action">TV : 4.200.000</button>
          <button type="button" class="list-group-item list-group-item-action">Kulkas : 3.100.000</button>
          <button type="button" class="list-group-item list-group-item-action">Mesin Cuci : 3.800.000</button>
          <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
            Harga Dapat Berubah Setiap Saat
          </button>
        </div>
      </div>
    </div>
  </div>
  <?php
    $proses = isset($_POST['proses']) ? $_POST['proses'] : '';
    $nama_customer = isset($_POST['customer']) ? $_POST['customer'] : '';
    $produk = isset($_POST['produk']) ? $_POST['produk'] : '';
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : 0;;
    $total = '';
    if ($produk == 'TV') {
      $total = $jumlah * 4200000;
    } elseif($produk == 'Kulkas'){
      $total = $jumlah * 3100000;
    } else {
      $total = $jumlah * 3800000;
    }

    echo'Proses : ' .$proses;
    echo'<br/>Nama Customer : '.$nama_customer;
    echo'<br/>Produk Pilihan : '.$produk;
    echo'<br/>Jumlah Beli : '.$jumlah;
    echo'<br/>Total Belanja : Rp '. number_format($total,2,',','.');
    ?>
</body>
</html>