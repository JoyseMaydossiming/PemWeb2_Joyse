<?php

// for ($i = 0; $i < 10; $i++){
//     echo $i."<br>";
// }

// $data = ["ayam","bebek","cicak","domba","entok"];

// Menggunakan For
// for ($i = 0; $i < count($data); $i++){
//     echo $data[$i]."<br>";
// }

// Menggunakan Foreach
// foreach ($data as $item){
//     echo $item."<br>";
// }

// Menggunakan Do While
// $x = 1;

// do {
//     echo "nomornya adalah : $x <br>";

//     $x++;

// } while($x < 5);

// Keluar dari kondisi
// for ($i = 0; $i < 10; $i++){
//     if ($i ==5){
//         break;
//     }
//     echo $i."<br>";
// }

// Melompati kondisi
for ($i = 0; $i < 10; $i++){
    if ($i ==5){
        continue;
    }
    echo $i."<br>";
}

?>