<?php
function testfunctionsql($condition, $message)
{
    if ($condition) {
        echo "<div class='alert alert-success mx-auto col-6 mt-5' role='alert'>
        $message succefully
        </div>";
    } else {
        echo "<div class='alert alert-danger mx-auto col-6 mt-5' role='alert'>
        $message falid
        </div>";
    }
}
function path($go)
{
    echo "<script> location.replace('/project/session9-10/$go')</script>";
}

function auth($num1 = null, $num2 = null, $num3 = null)
{
    if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin']['roles'] == 1 || $_SESSION['admin']['roles'] == $num1 || $_SESSION['admin']['roles'] == $num2 || $_SESSION['admin']['roles'] == $num3) {
        } else {
            path("shard/403.php");
        }
    } else {
        path("admin/login.php");
    }
}

function filtervalidation($inputvalue)
{
    $inputvalue = trim($inputvalue);
    $inputvalue = strip_tags($inputvalue);
    $inputvalue = htmlspecialchars($inputvalue);
    return $inputvalue;
}

function validtionFiles($image_size, $size)
{
    $image_size_validation = ($image_size / 1024) / 1024;
    if ($image_size_validation > $size) {
        return true;
    } else {
        return false;
    }
}

function validtionimahe_type($image_input)
{
    if ($image_input == "image/jpg" || $image_input == "image/jpeg" || $image_input == "image/png" || $image_input == "image/jif") {
        return false;
    } else {
        return true;
    }
}
