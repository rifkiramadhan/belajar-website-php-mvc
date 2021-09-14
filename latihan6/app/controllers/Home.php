<?php 

    class Home extends Controller {
        public function index()
        {
            // Memanggil komponen header, index dan footer dari folder yang berbeda
            $data['judul'] = 'Home';
            // Memanggil class model sekaligus menginstansiasi dan memanggil method getUser dan memanggil satu data
            $data['nama'] = $this->model('User_model')->getUser();
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }
    }

?>