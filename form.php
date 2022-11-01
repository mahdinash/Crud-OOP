<?php

require_once('user.php');
if (isset($_GET['id'])) {
    $user = User::find($_GET['id']);
}else {
    $user = new User;
}

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <title> List Users </title>
    </head>
    <body class="text-right">

        <div class="container my-4">

            <div class="mb-3">
                <a href="index.php"> بازگشت به لیست کاربران </a>
            </div>

            <form class="row justify-content-center" action="action.php" method="post">

                <div class="col-md-3">
                    <label for="first-name"> نام شخص </label>
                    <input id="first-name" type="text" class="form-control" name="first_name" value="<?=$user->first_name ?? null?>" required>
                </div>

                <div class="col-md-3">
                    <label for="last-name"> نام خانوادگی </label>
                    <input id="last-name" type="text" class="form-control" name="last_name" value="<?=$user->last_name ?? null?>" required>
                </div>

                <div class="col-md-3">
                    <label for="user-name"> نام کاربری </label>
                    <input id="user-name" type="text" class="form-control" name="username" value="<?=$user->username ?? null?>" required>
                </div>

                <?php if (!isset($user->id)) : ?>
                    <div class="col-md-3">
                        <label for="pass"> رمزعبور </label>
                        <input id="pass" type="text" class="form-control" name="password" value="" required>
                    </div>
                <?php endif; ?>

                <hr class="w-100">

                <div class="col-md-2 mx-auto">
                    <button type="submit" class="btn btn-primary btn-block" name="id"
                        value="<?=$user->id ?? null?>">
                        تایید
                    </button>
                </div>

            </form>

        </div>

    </body>
</html>
