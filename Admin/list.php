<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";
auth(1);
$select = "SELECT * FROM `adminsroyles`";
$s = mysqli_query($coon, $select);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = "DELETE FROM `admins` WHERE `id`=$id";
    $d = mysqli_query($coon, $delete);
    path("Admin/list.php");
}
?>
<div class="contaner col-sm-8 mt-5 mx-auto">
    <h1 class="title_h1 list_title">List Admin</h1>
    <div class="card mt-4 card-form">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Ruyle</th>
                        <th scope="col" class="text-center">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($s as $data) : ?>
                        <tr>
                            <th scope=" row"><?= $data['id'] ?></th>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['desciption'] ?></td>
                            <td class=" handle_btn text-center">
                                <a href="/project/session9-10/Admin/edite.php?edite_id=<?= $data['id'] ?>" class="btn btn-primary ">Edite</a>
                                <a href="/project/session9-10/Admin/list.php?id=<?= $data['id'] ?>" class="btn btn-danger ml-5 ">Delete</a>
                            </td>
                            <td class="handle_menu text-center">
                                <div class="dropdown-center">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/project/session9-10/Admin/edite.php?edite_id=<?= $data['id'] ?>"><i class="fa-regular fa-pen-to-square primary"></i></a></li>
                                        <li><a class="dropdown-item" href="/project/session9-10/Admin/show.php?show_id=<?= $data['id'] ?>"><i class="fa-solid fa-eye primary"></i></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include "../shard/script.php";
?>