<?php 

    class About extends Controller {
        // Method default
        public function index($nama = 'Rifki', $pekerjaan = 'Web Developer', $umur = 22)
        {
            $data['nama'] = $nama;
            $data['pekerjaan'] = $pekerjaan;
            $data['umur'] = $umur;

            // Memanggil komponen header, index dan footer dari folder yang berbeda
            $data['judul'] = 'About Me';
            $this->view('templates/header', $data);
            $this->view('about/index', $data);
            $this->view('templates/footer');
        }

        public function page()
        {
            // Memanggil komponen header, index dan footer dari folder yang berbeda
            $data['judul'] = 'Pages';
            $this->view('templates/header', $data);
            $this->view('about/page');
            $this->view('templates/footer');
        }
    }

?>