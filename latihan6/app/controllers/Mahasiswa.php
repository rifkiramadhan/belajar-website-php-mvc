<?php 

    class Mahasiswa extends Controller {
        public function index()
        {
            // Memanggil komponen header, index dan footer dari folder yang berbeda
            $data['judul'] = 'Daftar Mahasiswa';
            $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
        }
    }

?>