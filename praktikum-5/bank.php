<?php

class Account {
    var $nomor;
    var $name;
    var $saldo;

    public function __construct($no, $nama, $saldo){
        $this->nomor = $no;
        $this->name = $nama;
        $this->saldo = $saldo;
    }

    public function deposit($nominal){
        $this->saldo += $nominal;
    }

    public function withdraw($jumlah){
        $this->saldo -= $jumlah;
    }

    public function cetak(){
        echo "$this->saldo";
        // echo "Nomor account $this->nomor, saldo $this->name sekarang adalah $this->saldo <br/>";
    }

    public function customerTransfer(Account $no,$uang){
        $this->saldo -= $uang;
        
        $no->deposit($uang);
    }
}

// echo "Saldo Awal<br/>";
// $ahmad = new AccountBank('C001', 'Ahmad', 6000000);
// $budi = new AccountBank('C002', 'Budi', 5350000);
// $kurniawan = new AccountBank('C003', 'Kurniawan', 2500000);
// $ahmad->cetak();
// $budi->cetak();
// $kurniawan->cetak();


// echo "<br/>Saldo Setelah Menabung<br/>";
// $ahmad->deposit(1000000);
// $ahmad->cetak();

// echo "<br/>Saldo Setelah Trasfer<br/>";
// $ahmad->customerTransfer($kurniawan, 1500000);
// $ahmad->customerTransfer($budi, 500000);
// $ahmad->cetak();
// $budi->cetak();
// $kurniawan->cetak();

// echo "<br/>Saldo Setelah Tarik Tunai<br/>";
// $budi->withdraw(2500000);
// $budi->cetak();

?>