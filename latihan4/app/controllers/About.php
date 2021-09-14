<?php 

    class About {
        // Method default
        public function index($nama = 'Rifki', $pekerjaan = 'Web Developer')
        {
            echo "Halo, nama saya $nama, saya adalah seorang $pekerjaan";
        }

        public function page()
        {
            echo 'About/page';
        }
    }

?>