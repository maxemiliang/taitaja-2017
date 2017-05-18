<?php 
require_once './inc/autoload.php';

session_destroy();
header('location: ./../index.php');