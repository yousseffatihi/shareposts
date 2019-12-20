<?php
    class Post {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getPosts()
        {
            $this->db->query('SELECT *,
                                    posts.id as postId,
                                    users.id as userId
                                    FROM posts
                                    INNER JOIN users
                                    ON posts.user_id = users.id
                                    ORDER BY posts.created_at DESC');

            $result = $this->db->resultSet();

            return $result;
        }

        public function addPost($data)
        {
            $this->db->query('INSERT INTO POSTS (title, body, user_id) VALUES (:title, :body, :user_id)');
            // Bind the values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':user_id', $data['user_id']);
            // Insert the post
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }

        public function getPost($id)
        {
            $this->db->query('SELECT * FROM POSTS WHERE id = :postId');
            // Bind the values
            $this->db->bind(':postId', $id);
            // Execute the post
            $result = $this->db->single();
            return $result;
        }
    }