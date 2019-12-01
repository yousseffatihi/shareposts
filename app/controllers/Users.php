<?php

    class Users extends Controller{

        public function __construct()
        {

        }

        public function register(){
            //Check For Post Request
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process Form
                //Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please type your email';
                }

                //Validate name
                if(empty($data['name'])){
                    $data['name_err'] = 'Please type your full name';
                }

                //Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please type your password';
                }elseif (strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                //Validate Confirm Password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please Confirm password';
                }else {
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords don\'t match';
                    }
                }

                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    die('SUCCESS');
                }else {
                    $this->view('users/register', $data);
                }

            }else {
                //Load Form
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //Load View
                $this->view('/users/register',$data);
            }
        }

        public function login(){
            //Check For Post Request
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please type your email';
                }

                //Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please type your password';
                }elseif (strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                    die('SUCCESS');
                }else {
                    $this->view('users/login', $data);
                }
            }else {
                //Load Form
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                //Load View
                $this->view('/users/login',$data);
            }
        }
    }