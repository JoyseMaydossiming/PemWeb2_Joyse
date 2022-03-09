<?php
    $nama_buah = ["apel", "belimbing", "ceri", "durian"];
    $nilai_siswa = ["nim "=>"0110121128", "uts "=>100, "uas "=>90, "tugas "=>80];
    foreach ($nama_buah as $buah){
        echo $buah . "<br>";
    }
    foreach ($nilai_siswa as $nilai => $value){
        echo $nilai . $value . "<br>";
    }
?>