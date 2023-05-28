<?php
session_start();
if(!$_SESSION['user']) {
    header('Location: ../index.php');
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
            <div class="card">
                <img class="card-img-top" src="<?= $_SESSION['user']['avatar'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title"><?= $_SESSION['user']['name'] ?></h2>
                    <p class="card-text"><?= $_SESSION['user']['email'] ?></p>
                </div>
                <form action="../app/Controllers/logout.php" method="post">
                    <div class="d-grid gap-2">
                        <button class="btn btn-info mb-3" type="submit">Exit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
</body>
</html>