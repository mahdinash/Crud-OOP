<?php

session_start();
require_once('user.php');

$id = $_POST['id'];
User::destroy($id);
$_SESSION['message'] = "آیتم مورد نظر با موفقیت حذف شد.";

header('Location: index.php');
