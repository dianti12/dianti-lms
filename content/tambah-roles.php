<?php

if(isset($_GET['delete'])){
    $id_user = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM roles WHERE id='$id_user'");
    header("location:?page=roles&hapus=berhasil");
}
    if(isset($_POST['name'])){
        //ada tidak parameter bernama adit, kalo ada jalankan perintah edit/update, kalo tidak ada
        //tambah data baru / insert
            $name = $_POST['name'];
           
            $id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
            
            if(!isset($_GET['edit'])){
                    $insert = mysqli_query($config, "INSERT INTO roles (name) VALUES ('$name')");
                    header("location:?page=roles&tambah=berhasil");
                } else {
                   
                //update data
                $update = mysqli_query($config, "UPDATE roles SET name ='$name' WHERE id = '$id_user'");    
                    header("location:?page=roles&ubah=berhasil");
                } 
            }

              if(isset($_GET['edit'])){
        $id_user = $_GET['edit'];
        $queryEdit = mysqli_query($config, "SELECT * FROM roles WHERE id = '$id_user'");
        $dataEdit = mysqli_fetch_assoc($queryEdit);
    }
    
            

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                   Add Roles
                </h5>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Nama Roles</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your name Roles" required value="<?php echo isset($_GET['edit']) ? $dataEdit['name'] : '' ?>">
                    </div>
     
                    <div class="mb-3">
                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>