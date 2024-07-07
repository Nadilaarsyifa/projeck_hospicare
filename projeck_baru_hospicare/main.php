<?php
session_start();
if (empty($_SESSION['username_hospicare'])) {
    header('location:login');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOSPICARE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body style="height: 1000px;">
    <!--- Header --->
    <?php include "header.php"; ?>
    <!--- end Header --->
    <div class="container-lg">
        <div class="row">

            <!---sidebar--->
            <?php include "sidebar.php"; ?>
            <!----end sidebar---->

            <!---- content ---->
            <div class="col-lg-9">
                <?php
                include $page;
                ?>

            </div>
            <!----end content---->

        </div>

        <div class="fixed-bottom text-center mb-2">
            Copyright 2024 HospiCare
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>