<?php 
require "./../inc/session.php";
require "./../inc/db.php";
require "./../models/result.model.php";
require "./../models/branch.model.php";
require "./../models/sport.model.php";
require "./../helpers/get_constants.php";

$result = new ResultModel($db);
$sport = new SportModel($db);
$branch = new BranchModel($db);

$post = $_POST;

if (count($post) > 2) {
    $curr_branch = $branch->getBranchById($post['branch']);
    $curr_sport = $sport->getSportById($post['sport']);
    $consts = getConstants($curr_sport['name']);
    if ($post['branch'] < 3) {
        $result_arr = explode(',',$post['result']);
        $sec = ($result_arr[0]*60)+$result_arr[1];
        $points = round((1010/($sec/$consts[0])**($consts[1])-10), 0);
    } else {
        $points = round((1010/($consts[0]/$post['result'])**($consts[1])-10), 0);
    }

    if ($result->insertResult($_SESSION['user_id'], $curr_sport['sport_id'], $post['branch'], $post['result'], $points)) {
        header('location: ./../../user.php');
    }
}
