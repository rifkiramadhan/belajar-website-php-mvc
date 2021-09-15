<?php 

    // Membuat class flash untuk menentukan pesan flash nya seperti apa
    class Flasher {
        public static function setFlash($pesan, $aksi, $tipe)
        {
            $_SESSION['flash'] = [
                'pesan' => $pesan,
                'aksi' => $aksi,
                'tipe' => $tipe
            ];
        }

        // Membuat function untuk melakukan flash nya dan untuk menampilkan pesannya
        public static function flash()
        {
            // Jika terdapat session flash maka tampilkan pesannya
            if( isset($_SESSION['flash']) ) {
                echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                            Data Mahasiswa <strong>' . $_SESSION['flash']['pesan'] . ' </strong>' . $_SESSION['flash']['aksi'] . ' 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                
                // Dan hapus pesannya ketika di close, sehingga ketika di refresh session nya sudah tidak ada lagi
                unset($_SESSION['flash']);
            }
        }
    }

?>