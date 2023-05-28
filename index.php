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
            <?php

            if (isset($_SESSION['message'])) {
                echo '<div class="alert alert-success text-center" role="alert">' . $_SESSION['message'] . '</div>';
            }
            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger text-center" role="alert">' . $_SESSION['error'] . '</div>';
            }
            unset($_SESSION['message']);
            unset($_SESSION['error']);
            ?>
            <form method="post" action="./app/Controllers/sign_in.php" class="needs-validation form-layout" id="form"
                  novalidate>
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter login
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter password.
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary mb-3" type="submit">Enter</button>
                </div>
                <div>
                    <p>Если у вас нет аккунта - <a class="link-primary" href="./register.php">Зарегестрируйтесь</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>