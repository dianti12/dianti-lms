<?php
include 'config/koneksi.php';
if (isset($GET['delete'])) {
    $id_user = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM majors WHERE id = '$id_user'");

    header("location:?page=major&hapus=berhasil");
}
if (isset($_POST['name'])) {
    $header = isset($_GET['edit']) ? 'Edit' : 'Add';
    $id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
    $queryEdit = mysqli_query($config, "SELECT * FROM majors WHERE id = '$id_user'");
    $dataEdit = mysqli_fetch_assoc($queryEdit);

    //jika ada parameter edit, maka tampilkan form untuk edit, jika tidak ada tampilkan form untuk tambah
    //ada tidak parameter bernama adit, kalo ada jalankan perintah edit/update, kalo tidak ada
    //tambah data baru / insert

    $name = $_POST['name'];


    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO majors (name) VALUES ('$name')");
        header("location:?page=major&tambah=berhasil");
    } else {

        //update data
        $update = mysqli_query($config, "UPDATE majors SET name ='$name' WHERE id = '$id_user'");
        header("location:?page=major&ubah=berhasil");
    }
}
if (isset($_GET['edit'])) {
    $id_user = $_GET['edit'];
    $queryEdit = mysqli_query($config, "SELECT * FROM majors WHERE id = '$id_user'");
    $dataEdit = mysqli_fetch_assoc($queryEdit);
}

$id_instructor = isset($_SESSION['ID_USER']) ? $_SESSION['ID_USER'] : '';
$queryInstructorMajor = mysqli_query($config, "SELECT majors.name, instructor_majors.* 
FROM instructor_majors LEFT JOIN majors ON majors.id = instructor_majors.id_major 
WHERE instructor_majors.id_instructor = '$id_instructor'");

$rowInstructorMajors = mysqli_fetch_all($queryInstructorMajor, MYSQLI_ASSOC);
// print_r($rowInstructorMajors);
// die;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    add Moduls
                </h5>

                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="">instructor Name *</label>
                                <input readonly value="<?php echo $_SESSION['NAME'] ?>" type="text" name="name" class="form-control">
                                <input type="hidden" name="id_instructor" value="<?php echo $_SESSION['ID_USER'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Major Name</label>
                                <select name="id_major" id="" class="form-control">
                                    <option value="">Select One</option>
                                    <?php foreach ($rowInstructorMajors as $row): ?>
                                        <option value="<?php echo $row['id_major'] ?>">
                                            <?php echo $row['name'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>