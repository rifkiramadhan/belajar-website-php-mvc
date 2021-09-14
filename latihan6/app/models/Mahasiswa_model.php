<?php

    class Mahasiswa_model {
        // Membuat data mahasiswa dari array of object
        // private $mhs = [
        //     [
        //         "nama" => "Rifki Ramadhan",
        //         "nrp" => "043040023",
        //         "email" => "riifkiramadhan2@gmail.com",
        //         "jurusan" => "Teknik Informatika"
        //     ],
        //     [
        //         "nama" => "Doddy Ferdiansyah",
        //         "nrp" => "133040321",
        //         "email" => "doddy@gmail.com",
        //         "jurusan" => "Teknik Mesin"
        //     ],
        //     [
        //         "nama" => "Erik Doank",
        //         "nrp" => "163030123",
        //         "email" => "erik@yahoo.com",
        //         "jurusan" => "Teknik Industry"
        //     ]
        // ];

        // public function getAllMahasiswa()
        // {
        //     return $this->mhs;
        // }

        // Membuat variable PDO
        private $dbh; // Database Handler
        private $stmt; // Statement

        // Mengkoneksikan ke database
        public function __construct()
        {
            // DSN (Data Source Name)
            $dsn = 'mysql:host=localhost;dbname=phpmvc';

            // Apakah koneksinya berhasil atau tidak ?
            try {
                $this->dbh = new PDO($dsn, 'root', '');
        
            // Ketika error tangkap exception nya
            } catch (PDOException $e) {
                // Dan tampilkan pesan errornya
                die($e->getMessage());
            }
        }

        // Mendapatkan semua data mahasiswa
        public function getAllMahasiswa()
        {
            $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
            $this->stmt->execute();

            // Mengambil semua datanya jika datanya ada banyak
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }


?>