<?php
    /**
     * This is a base controller,
     * It loads the models and views 
     */
    class Controller {
        // Load model
        public function model($model)
        {
            //Require the model
            require_once '../app/models/' . $model . '.php';

            //Instantiate model
            return new $model();    
        }

        // Load view 
        public function view($view, $data = [])
        {
            // Check for view file
            if(file_exists('../app/views/' . $view . '.php')){
                // If it's exists then require the view file
                require_once '../app/views/' . $view . '.php';
            }else {
                die('Oops! The view does not exists.');
            }

        }
    }
?>