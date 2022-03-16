<?php
function presentase($nilai_uts, $nilai_uas, $nilai_tugas){
  $result = ceil(($nilai_uts*30/100) + ($nilai_uas*35/100) + ($nilai_tugas*35/100));
  return $result;
}
function kelulusan($_nilai) {
    if ($_nilai > 55 ){
    return 'LULUS';
    }else {
    return 'TIDAK LULUS';
    }
}
function grade ($_nilai){
    if ($_nilai <= 100 && $_nilai >= 85) {
        return 'A';
    } else if ($_nilai <= 84 && $_nilai >= 70) {
        return 'B';
    } else if ($_nilai <= 69 && $_nilai >= 56) {
        return 'C';
    } else if ($_nilai <= 55 && $_nilai >= 36) {
        return 'D';
    } else if ($_nilai <= 35 && $_nilai >= 0) {
        return'E';
    } else {
      return 'I';
    }
}
function predikat($_grade){
    switch ($_grade)
    {
      case 'A' :
        return ' Sangat Memuaskan ';
        break;
      case 'B' :
        return ' Memuaskan ';
        break;
      case 'C' :
        return ' Cukup ';
        break;
      case 'D' :
        return ' Kurang ';
        break;
      case 'E' :
        return ' Sangat Kurang ';
        break;
      default : 
        return ' Tidak Ada ';
    }
}
?>