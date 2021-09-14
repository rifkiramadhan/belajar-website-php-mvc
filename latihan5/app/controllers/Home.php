<?php 

    class Home extends Controller {
        public function index()
        {
            // Memanggil komponen header, index dan footer dari folder yang berbeda
            $data['judul'] = 'Home';
            $this->view('templates/header', $data);
            $this->view('home/index');
            $this->view('templates/footer');
        }
    }

?>