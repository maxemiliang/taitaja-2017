<?php 

class SportModel 
{

    protected $db;

    public function __construct(PDO $db) 
    {
        $this->db = $db;
    }

    public function getSportById($id) {
        $stmt = $this->db->prepare('SELECT * FROM sport WHERE sport_id = :id');

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function getSportsByBranchName($name) {
        $stmt = $this->db->prepare('SELECT sport.name, sport.sport_id FROM sport left join branch on sport.branch_id = branch.branch_id where branch.name = :name');
        
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

}