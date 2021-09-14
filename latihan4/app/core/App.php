<?php 

    class App {
        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];

        public function __construct()
        {
            $url = $this->parseURL();
    
            if($url == NULL) {
                $url = [$this->controller];
            }

            // Controller
            // Jika terdapat file yang bernama Home.php di dalam folder controllers
            if( file_exists('../app/controllers/' . $url[0] . '.php') ) {

                // Jika ada maka akan menimpa controller yang baru
                $this->controller = $url[0];
                unset($url[0]);
            }

            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            // Method
            // Jika urlnya tersedia
            if( isset($url[1]) ) {
                // Dan apakah urlnya tersedia, jika ada maka jalankan
                if( method_exists($this->controller, $url[1]) ) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // Kelola parameternya
            if( !empty($url) ) {
                $this->params = array_values($url);
            }

            // Jalankan controller dan method, serta kirimkan params jika ada
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function parseURL()
        {
            // Jika terdapat URL
            if( isset($_GET['url']) ) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }

?>