<?php

    // Jika di dalam aplikasi kita tidak terdeteksi ada session id, maka jalankan session nya
    if( !session_id() ) {
        
        session_start();
    } 

    // Menjalankan Teknik Bootstraping
    require_once '../app/init.php';

    // Menjalankan Class App
    $app = new App;
?>