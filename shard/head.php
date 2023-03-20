<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/project/session9-10/assets/fontawesome/all.min.css">
    <link rel="stylesheet" href="/project/session9-10/assets/css/main.css">

    <?php
    if (isset($_SESSION['style']))
        if ($_SESSION['style'] == "white") :
    ?>
        <link rel="stylesheet" href="/project/session9-10/assets/css/style_white.css">
    <?php endif; ?>
    <title>Admin</title>
</head>

<body>