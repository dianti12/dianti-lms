<?php
if (isset($_GET['delete'])) {
    $id_user = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM instructors WHERE id='$id_user'");
    header("location:?page=instruktur&hapus=berhasil");
}
if (isset($_POST['name'])) {
    //ada tidak parameter bernama adit, kalo ada jalankan perintah edit/update, kalo tidak ada
    //tambah data baru / insert
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $password = isset($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];

    $id_user = isset($_GET['edit']) ? $_GET['edit'] : '';

    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO instructors (name, gender, education, phone, email, password, address  ) VALUES ('$name', '$gender', '$education', '$phone', '$email','$password', '$address')");
        header("location:?page=instruktur&tambah=berhasil");
    } else {

        //update data
        $update = mysqli_query($config, "UPDATE instructors SET name ='$name', gender ='$gender', education ='$education' , phone = '$phone' , email = '$email', password = '$password', address ='$address' WHERE id = '$id_user' ");
        header("location:?page=instruktur&ubah=berhasil");
    }
}

$edit = isset($_GET['edit']) ? $_GET['edit'] : '';
$name = mysqli_query($config, "SELECT * FROM instructors WHERE id ='$edit'");
$rowname = mysqli_fetch_assoc($name);

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    add instructor
                </h5>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Nama Instruktur</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your name" required value="<?php echo isset($_GET['edit']) ? $rowname['name'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="radio" name="gender" value="0" id="gender_male" required value=" ">
                            <label for="gender_male">Male</label>

                            <input type="radio" name="gender" value="1" id="gender_female" required>
                            <label for="gender_female">Female</label>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="">Education*</label>
                        <input type="text" name="education" class="form-control" placeholder="Enter Your education" required value="<?php echo isset($_GET['edit']) ? $rowname['education'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="">Phone*</label>
                        <input type="number" name="phone" class="form-control" placeholder="Enter Your phone" required value="<?php echo isset($_GET['edit']) ? $rowname['phone'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="">Email*</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your email" required value="<?php echo isset($_GET['edit']) ? $rowname['email'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="">Password*</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Your password" <?php echo empty($_GET['edit']) ? 'required' : '' ?>>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-2">
                            <label for="">Address</label>
                        </div>
                        <div class="col-sm-10">
                            <textarea name="address" id="" cols="30" rows="5">
                                <?php echo isset($_GET['edit']) ? $rowname['email'] : '' ?>
                            </textarea>
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