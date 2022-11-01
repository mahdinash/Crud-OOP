<?php

session_start();
$message = $_SESSION['message'] ?? null;
if ($message) {
    $_SESSION['message'] = null;
}
require_once('user.php');
$users = User::all();

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

            <?php if ($message): ?>
                <div class="alert alert-success">
                    <?=$message?>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <a href="form.php"> تعریف کاربر جدید </a>
            </div>

            <table class="table table-bordered table-stripped text-center">
                <thead>
                    <tr>
                        <th> نام کاربری </th>
                        <th> نام </th>
                        <th> نام خانوادگی </th>
                        <th colspan="2"> عملیات </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $key => $user): ?>
                        <tr>
                            <td> <?= $user->username ?> </td>
                            <td> <?= $user->first_name ?> </td>
                            <td> <?= $user->last_name ?> </td>
                            <td> <a class="btn btn-success btn-sm" href="form.php?id=<?= $user->id ?>"> ویرایش </a> </td>
                            <td>
                                <form action="delete.php" method="post">
                                    <button type="submit" class="btn btn-danger btn-sm" name="id"
                                        onclick="return confirm('Are you sure?');"
                                        value="<?= $user->id ?>">
                                        حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </body>
</html>
