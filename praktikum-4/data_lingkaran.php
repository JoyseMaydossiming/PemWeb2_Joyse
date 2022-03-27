<?php
require_once "class_lingkaran.php";
echo "MENGHITUNG LUAS & KELILING LINGKARAN<br/>";
echo "NILAI PHI " . Lingkaran::PHI ."<br/>";
$lingkar1 = new Lingkaran( 10 );
$lingkar2 = new Lingkaran( 4 );
echo "<br/>Luas Lingkaran I ".$lingkar1->getLuas();
echo "<br/>Luas Lingkaran II ".$lingkar2->getLuas();
echo "<br/>Keliling Lingkaran I ".$lingkar1->getKeliling();
echo "<br/>Keliling Lingkaran II ".$lingkar2->getKeliling();
?>