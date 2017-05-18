<?php

class BranchModel 
{

    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getBranchById($id) {
        $stmt = $this->db->prepare('SELECT * FROM branch WHERE branch_id = :id');

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();

    } 

}