<?php

require_once('user.php');
session_start();

$id = $_POST['id'];
if ($id) {
    User::update($id, $_POST);
    $_SESSION['message'] = "آیتم مورد نظر ویرایش شد.";
}else {
    User::store($_POST);
    $_SESSION['message'] = "آیتم مورد نظر در سیستم ایجاد شد.";
}

header('Location: index.php');
