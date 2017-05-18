<?php 

class UserModel 
{

    protected $db;

    public function __construct(PDO $db) 
    {
        $this->db = $db;
    }

    public function getUserByName($name) 
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = :username;');

        $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $stmt->bindParam(':username', $name, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function insertUser($name, $password) 
    {
        $stmt = $this->db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');

        $username = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':username', $name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        return $stmt->execute();
    }   

}