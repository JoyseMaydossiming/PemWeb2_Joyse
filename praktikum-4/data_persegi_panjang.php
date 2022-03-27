<?php
require_once "class_persegi_panjang.php";
$persegi_panjang1 = new PersegiPanjang( 10,5 );
$persegi_panjang2 = new PersegiPanjang( 8,6 );
echo "MENGHITUNG LUAS & KELILING PERSEGI PANJANG<br/>";
echo "<br/>Luas Persegi Panjang I ".$persegi_panjang1->getLuas();
echo "<br/>Luas Persegi Panjang II ".$persegi_panjang2->getLuas();
echo "<br/>Keliling Persegi Panjang I ".$persegi_panjang1->getKeliling();
echo "<br/>Keliling Persegi Panjang II ".$persegi_panjang2->getKeliling();
?>