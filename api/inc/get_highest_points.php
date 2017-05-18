<?php 
require "./api/inc/db.php";
require "./api/models/result.model.php";

function getHighestPoints($user_id, $db) {
    $point_arr = [];
    $result = new ResultModel($db);

    for ($i = 1; $i < 5; $i++) {
        $point[$i] = $result->getHighestScoreByBranchAndUser($user_id, $i);
    }

    return $point;
}