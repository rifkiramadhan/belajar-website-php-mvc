<?php 

    class Database {
        // Mendeklarasikan data dari database yang ada di dalam file config
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $db_name = DB_NAME;

        // Mendeklarasikan variable untuk koneksi dari database
        private $dbh;
        private $stmt;

        // Mendeklarasikan construct untuk koneksi dari database
        public function __construct()
        {
            // DSN (Data Source Name)
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

            // Parameter dari konfigurasi database
            $option = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            // Apakah koneksinya berhasil atau tidak ?
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        
            // Ketika error tangkap exception nya
            } catch (PDOException $e) {
                // Dan tampilkan pesan errornya
                die($e->getMessage());
            }
        }

        // Membuat function untuk menjalankan query generic (Bisa dipakai untuk apapun) Insert, Update, Delete, dll
        public function query($query)
        {
            $this->stmt = $this->dbh->prepare($query);
        }

        // Jika querynya sudah disiapkan, maka kita akan binding data nya
        public function bind($param, $value, $type = null)
        {
            if( is_null($type) ) {
                switch( true ) {
                    case is_int($value) :
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value) :
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value) :
                        $type = PDO::PARAM_NULL;
                        break;
                    default :
                        $type = PDO::PARAM_STR;
                    
                }
            }

            // Membuat bind parameter, value dan type agar terhindar dari SQL injection, Karena query di eksekusi terlebih dahulu setelah stringnya dibersihkan
            $this->stmt->bindValue($param, $value, $type);
        }

        // Membuat function exekusi
        public function execute()
        {
            $this->stmt->execute();
        }
       
        // Setelah di eksekusi hasilnya ini banyak
        public function resultSet()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Setelah di eksekusi hasilnya ini satu
        public function single()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

    }

?>