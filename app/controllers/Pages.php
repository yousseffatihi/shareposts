<?php
    class Pages extends Controller{

        public function __construct()
        {

        }

        public function index()
        {
            $data = [
                'title' => 'Welcome',
                'description' => 'Simple Social network built on Simple MVC PHP Framework'
            ];
            $this->view('pages/index', $data);
        }

        public function about()
        {
            $data = [
                'title' => 'About Us',
                'description' => 'This App built on costume PHP MVC that helps you to share other posts with your friends'
            ];
            $this->view('pages/about', $data);
        }
    }
?>