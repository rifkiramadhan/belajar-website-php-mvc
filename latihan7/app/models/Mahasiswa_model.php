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
    }


?>