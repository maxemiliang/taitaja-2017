<?php 
require_once "inc/autoload.php";
require_once "models/user.model.php";

$user = new UserModel($db);

$post = $_POST;

$check = $user->getUserByName($post['username']);

if (count($check) <= 1 && strlen($post['username']) > 3 && strlen($post['username']) < 51 && strlen($post['password']) > 3 && strlen($post['password']) < 80) {
    if($user->insertUser($post['username'], $post['password'])) {
        $current_user = $user->getUserByName($post['username']);
        $_SESSION['username'] = $current_user['username'];
        $_SESSION['user_id'] = $current_user['user_id'];
        header('location: ./../user.php');
    }
} else {
    $_SESSION['reg_err'] = 1;
    header('location: ./../register.php');
}