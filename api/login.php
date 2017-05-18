<?php 
require_once "inc/autoload.php";
require_once "models/user.model.php";

$user = new UserModel($db);

$post = $_POST;

$current_user = $user->getUserByName($post['username']);

if (count($current_user) > 1) {
    if (password_verify($post['password'], $current_user['password'])) {
        $_SESSION['username'] = $current_user['username'];
        $_SESSION['user_id'] = $current_user['user_id'];
        header('location: ./../user.php');
    } else {
        redir();
    }
} else {
    redir();
}

function redir() {
    $_SESSION['log_err'] = 1;
    header('location: ./../login.php');
}
