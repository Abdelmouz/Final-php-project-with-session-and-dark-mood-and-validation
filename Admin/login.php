<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";
if (isset($_POST['btn_login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $hashpass = sha1($pass);
    $select = "SELECT * FROM `admins` where `username`='$user' and`password`='$hashpass'";
    $s = mysqli_query($coon, $select);
    $data = mysqli_fetch_assoc($s);
    $numrows = mysqli_num_rows($s);
    if ($numrows) {
        $_SESSION['admin'] = [
            "name" => $data['username'],
            "roles" => $data['roles'],
            "id" => $data['id']
        ];
        path("index.php");
    }
}
?>
<div class="contaner col-sm-8 mt-5 mx-auto">
    <h1 class="title_h1 list_title">Login</h1>
    <div class="card mt-4 card-form">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Username :</label>
                    <input type="text" name="user" class="form-control mt-1">
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="text" name="pass" class="form-control mt-1">
                </div>
                <button name="btn_login" class="btn btn-primary mt-3 w-100">Login</button>

            </form>
        </div>
    </div>
</div>


<?php
include "../shard/script.php";
?>