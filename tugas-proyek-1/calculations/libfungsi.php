<?php

class BMI {
    public $berat;
    public $tinggi;
    // public $nilai_BMI;
    // public $status_BMI;

    function __construct($berat, $tinggi) 
    {
        $this->berat = $berat;
        $this->tinggi = $tinggi;
        // $this->nilai_BMI = $nilai_BMI;
        // $this->status_BMI = $status_BMI;
    }

    function getBerat()
    {
        return $this->berat;
    }

    function getTinggi()
    {
        return $this->tinggi;
    }

    function getNilai()
    {
        $berat_Badan= $this->berat;
        $tinggi_Badan= ($this->tinggi * 0.01) ** 2;
        
        $nilai_BMI = $berat_Badan / $tinggi_Badan;
        return number_format($nilai_BMI, 1);
    }

    function getStatus ($_nilai){
        if ($_nilai >= 30.0) {
            return 'Kegemukan / Obesitas';
        } else if ($_nilai <= 29.0 && $_nilai >= 25.0) {
            return 'Kelebihan Berat Badan';
        } else if ($_nilai <= 24.9 && $_nilai >= 18.5) {
            return 'Normal / Ideal';
        } else if ($_nilai <= 18.4) {
            return 'Kekurangan Berat Badan';
        } else {
        return 'Tidak Ditemukan';
        }
    }
}

class Pasien {
    public $id;
    // public $kode;
    public $nama;
    public $tmp_Lahir;
    public $tgl_Lahir;
    public $email;
    public $gender;

    function __construct($nama, $tmp_Lahir, $tgl_Lahir, $email, $gender)
    {
        // $this->kode = $kode;
        $this->nama = $nama;
        $this->tmp_Lahir = $tmp_Lahir;
        $this->tgl_Lahir = $tgl_Lahir;
        $this->email = $email;
        $this->gender = $gender;
    }

    function getKode()
    {
        $noUrut = 3;
        $noUrut++;
        $char = "JOY";
        $kode = $char . sprintf("%03s", $noUrut);
        return $kode;
    }

    function getNama()
    {
        return $this->nama;
    }

    function getTempatLahir()
    {
        return $this->tmp_Lahir;
    }

    function getTanggalLahir()
    {
        $dob = $this->tgl_Lahir;
        $date = date("d-m-Y", strtotime($dob));
        return $date;
    }

    function getUmur()
    {
        $lahir = new DateTime($this->tgl_Lahir);
        $sekarang   = new DateTime('today');
        $umur = $lahir->diff($sekarang)->y;
        return $umur;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getGender()
    {
        return $this->gender;
    }
}

class BMIPasien{
    public BMI $bmi;
    public $tanggal;
    public Pasien $pasien;

    function __construct($bmi, $tanggal, $pasien)
    {
        $_classBMI = new BMI;
        $this->bmi = $_classBMI.getNilai();

        
        $_classPasien = new Pasien;
        $this->pasien = $_classPasien.getNama();
        $this->tanggal = $_classPasien.get;
    }
}

?>
