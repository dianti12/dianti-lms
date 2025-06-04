<?php
if(isset($_GET['delete'])){
    $id_user = $_GET['delete'];
    $queryDelete = mysqli_query($config, "UPDATE users SET deleted_at = 1 WHERE id = '$id_user'");

    if ($queryDelete) {
        header("location:?page=user&hapus=berhasil");
    } else {
        header("location:?page=user&hapus=gagal");
    }
}
    if(isset($_POST['name'])){
        //ada tidak parameter bernama adit, kalo ada jalankan perintah edit/update, kalo tidak ada
        //tambah data baru / insert
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = isset($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password']; // jika password tidak diubah, gunakan password lama
            // jika password diubah, gunakan password baru yang sudah di-hash;
            $id_user = isset($_GET['edit']) ? $_GET['edit'] : '';

            
            if(!isset($_GET['edit'])){
                    $insert = mysqli_query($config, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
                    header("location:?page=user&tambah=berhasil");
                    
                } else {
                   
                //update data
                $update = mysqli_query($config, "UPDATE users SET name ='$name', email ='$email', password ='$password' WHERE id = '$id_user'");    
                    header("location:?page=user&ubah=berhasil");
                } 
            }
            
    if(isset($_GET['edit'])){
        $id_user = $_GET['edit'];
        $queryEdit = mysqli_query($config, "SELECT * FROM users WHERE id = '$id_user'");
        $dataEdit = mysqli_fetch_assoc($queryEdit);
    }
    


?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo isset($id_user)? 'Edit':'Add' ?>
                     User
                </h5>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Fullname</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your name" required value="<?php echo isset($_GET['edit']) ? $dataEdit['name'] : '' ?>">

                        <!-- cara lain 
                        value="<?php echo isset($rowEdit['name']) ? $rowEdit['name'] : '' ?>" 
                        -->

                    </div>

                    <div class="mb-3">
                        <label for="">Email*</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your email" required value="<?php echo isset($_GET['edit']) ? $dataEdit['email'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="">Password*</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Your password" <?php echo empty($id_user) ? 'required' : '' ?>>
                        
                        <small>
                        *jika ingin diubah silahkan diisi, jika tidak ingin diubah silahkan kosongkan
                        *If you want to change the password, please fill it in, if you do not want to change it, please leave it blank
                        </small>
                    </div>

                    <div class="mb-3">
                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>