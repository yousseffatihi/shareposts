<?php


class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Register User
    public function register($data){
        $this->db->query('INSERT INTO users (name, email, password) values (:name, :email, :password)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute
        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    //Login user
    public function login($email, $password){
        $this->db->query('SELECT * FROM users where email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        //Check Row
        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }

    //Find User by Email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users where email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        //Check Row
        if ($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users where id = :id');
        // Bind the parameters
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }
}