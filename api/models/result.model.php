<?php 

class ResultModel
{

    protected $db;

    public function __construct(PDO $db) 
    {
        $this->db = $db;
    }

    public function insertResult($user_id, $sport_id, $branch_id, $result, $points) 
    {
        $stmt = $this->db->prepare('INSERT INTO results (user_id, sport_id, branch_id, results, points) VALUES (:uid, :sid, :bid, :result, :points)');

        $sport_id = filter_var($sport_id, FILTER_SANITIZE_NUMBER_INT);
        $branch_id = filter_var($branch_id, FILTER_SANITIZE_NUMBER_INT);        
        $result = filter_var($result, FILTER_SANITIZE_STRING);

        $stmt->bindParam(':uid', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':sid', $sport_id, PDO::PARAM_INT);
        $stmt->bindParam(':bid', $branch_id, PDO::PARAM_INT);
        $stmt->bindParam(':result', $result, PDO::PARAM_STR);
        $stmt->bindParam(':points', $points, PDO::PARAM_INT);
        
        return $stmt->execute();
    }


    public function getHighestScoreByBranchAndUser($user_id, $branch_id) 
    {
        $stmt = $this->db->prepare('SELECT * FROM results WHERE user_id = :uid AND branch_id = :bid ORDER BY points DESC LIMIT 1');

        $branch_id = filter_var($branch_id, FILTER_SANITIZE_NUMBER_INT);
        $stmt->bindParam(':uid', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':bid', $branch_id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAllPoints($user_id) {
        $stmt = $this->db->prepare('SELECT sport.name, results.results, results.points from results LEFT JOIN sport ON sport.sport_id = results.sport_id WHERE results.user_id = :uid');
        $stmt->bindParam(':uid', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}