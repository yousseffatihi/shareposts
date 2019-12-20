<?php
    class Posts extends Controller{

        public function __construct()
        {
            if(!isset($_SESSION['user_id'])){
                redirect('users/login');
            }
            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }

        public function index()
        {
            //Get Posts
            $posts = $this->postModel->getPosts();

            $data = [
                'posts' => $posts
            ];

            $this->view('posts/index', $data);
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //Validate Title
                if(empty($data['title'])){
                    $data['title_err'] = 'Please type the title';
                }

                if(empty($data['body'])){
                    $data['body_err'] = 'Write the body and express yourself in few lines.'; 
                }

                // Make sure there's no errors
                if(empty($data['title_err']) && empty($data['body_err'])){
                    //Validate
                    if($this->postModel->addPost($data)){
                        flash('post_message', 'Post Added');
                        redirect('posts/');
                    }else {
                        die('Something went wrong');
                    }
                } else {
                    // Load the view with errors
                    $this->view('posts/add');
                }
            } else {
                $data = [
                    'title' => '',
                    'body' => '',
                    'title_err' => '',
                    'body_err' => ''
                ];
                $this->view('posts/add', $data);
            }
        }

        public function show($id)
        {
            $post = $this->postModel->getPost($id);
            $user = $this->userModel->getUserById($id);
            $data = [
                'post' => $post,
                'user' => $user
            ];
            $this->view('posts/show', $data);
        }
    }