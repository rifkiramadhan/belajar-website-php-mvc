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

        public function detail($id)
        {
            // Memanggil komponen header, index dan footer dari folder yang berbeda
            $data['judul'] = 'Detail Mahasiswa';
            $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
            $this->view('templates/header', $data);
            $this->view('mahasiswa/detail', $data);
            $this->view('templates/footer');
        }

        // Ketika buttonnya diklik maka data akan masuk kedalam function tambah
        public function tambah()
        {
            // Jika ada data mahasiswa yang nilainya lebih besar dari 0 maka ada baris baru yang ditambahkan
            if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
                // Pindahkan ke halaman utama mahasiswa
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } 
        }
    }

?>