<?php

    class Mahasiswa_model {

        private $table = 'mahasiswa';
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        // Mendapatkan semua data mahasiswa
        public function getAllMahasiswa()
        {
            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->resultSet();
        }

        // Membuat function untuk menyimpan data yang akan di binding, jadi id nya tidak langsung dimasukkan $id agar aman dari SQL Injection
        public function getMahasiswaById($id)
        {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
            $this->db->bind('id', $id);
            return $this->db->single();
        }

        public function tambahDataMahasiswa($data) 
        {
            // Komentari baris ini jika ingin mengecek data gagal ditambahkan dan jalankan return 0;
            $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nrp, :email, :jurusan)";

            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nrp', $data['nrp']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('jurusan', $data['jurusan']);

            $this->db->execute();

            return $this->db->rowCount();
            // return 0;
        }

        // Membuat function untuk mengubah data mahasiswa
        public function hapusDataMahasiswa($id)
        {
            $query = "DELETE FROM mahasiswa WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            // Mengeksekusi databasenya
            $this->db->execute();

            // Jika berhasil dihapus maka akan menghasilkan angka 1
            return $this->db->rowCount();
        }

        public function ubahDataMahasiswa($data) 
        {
            // Komentari baris ini jika ingin mengecek data gagal diubah dan jalankan return 0;
            $query = "UPDATE mahasiswa SET
                             nama = :nama,
                             nrp = :nrp,
                             email = :email,
                             jurusan = :jurusan
                      WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nrp', $data['nrp']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('jurusan', $data['jurusan']);
            $this->db->bind('id', $data['id']);

            $this->db->execute();

            return $this->db->rowCount();
            // return 0;
        }
    }


?>