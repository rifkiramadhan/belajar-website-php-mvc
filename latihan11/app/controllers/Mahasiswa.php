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
                // Sebelum data ditambahkan maka jalankan flashernya
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                
                // Pindahkan ke halaman utama mahasiswa
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                // Sebelum data ditambahkan maka jalankan flashernya
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                
                // Pindahkan ke halaman utama mahasiswa
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        // Ketika buttonnya diklik maka data akan masuk kedalam function hapus
        public function hapus($id)
        {
            // Jika ada data mahasiswa yang nilainya lebih besar dari 0 maka ada baris baru yang dihapus
            if( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {
                // Sebelum data dihapus maka jalankan flashernya
                Flasher::setFlash('berhasil', 'dihapus', 'success');
                
                // Pindahkan ke halaman utama mahasiswa
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                // Sebelum data dihapus maka jalankan flashernya
                Flasher::setFlash('gagal', 'dihapus', 'danger');
                
                // Pindahkan ke halaman utama mahasiswa
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function getubah()
        {
            echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
        }

        public function ubah()
        {
            // Jika ada data mahasiswa yang nilainya lebih besar dari 0 maka ada baris baru yang ditambahkan
            if( $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ) {
                // Sebelum data ditambahkan maka jalankan flashernya
                Flasher::setFlash('berhasil', 'diubah', 'success');
                
                // Pindahkan ke halaman utama mahasiswa
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                // Sebelum data ditambahkan maka jalankan flashernya
                Flasher::setFlash('gagal', 'diubah', 'danger');
                
                // Pindahkan ke halaman utama mahasiswa
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
    }

?>