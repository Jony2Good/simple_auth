<?php
session_start();
if(isset($_SESSION['user'])) {
    header('Location: ./view/profile.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authorization and registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body class="bg-light">

<div class="container vh-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-4 shadow rounded p-2">
            <form method="post" action="app/Controllers/register.php" class="needs-validation form-layout"
                  enctype="multipart/form-data" novalidate>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="name" required>
                    <div class="invalid-feedback">
                        Please enter your name.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" placeholder="login" required>
                    <div class="invalid-feedback">
                        Please enter your name.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com"
                           required>
                    <div class="invalid-feedback">
                        Please enter email address.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Set your avatar</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Enter your password</label>
                    <input type="password" name="password" class="form-control">

                </div>
                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Submit your password</label>
                    <input type="password" name="password_confirm" class="form-control">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary mb-3" type="submit">Enter</button>
                </div>
                <div>
                    <p>Если у вас есть аккунт - <a class="link-primary" href="./index.php">Авторизируйтесь</a></p>
                </div>

                <?php

                if (isset($_SESSION['message'])) {
                   echo '<div class="alert alert-danger text-center" role="alert">' . $_SESSION['message'] . '</div>';
                }
                unset($_SESSION['message']);
                ?>
            </form>
        </div>
    </div>
</div>
</body>
</html>