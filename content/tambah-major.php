<?php
include 'config/koneksi.php';
if(isset($GET['delete'])){
    $id_user = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM majors WHERE id = '$id_user'");
   
        header("location:?page=major&hapus=berhasil");
     
}
    if(isset($_POST['name'])){
        $header = isset($_GET['edit']) ? 'Edit' : 'Add';
        $id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
        $queryEdit = mysqli_query($config, "SELECT * FROM majors WHERE id = '$id_user'");
        $dataEdit = mysqli_fetch_assoc($queryEdit);
            
        //jika ada parameter edit, maka tampilkan form untuk edit, jika tidak ada tampilkan form untuk tambah
        //ada tidak parameter bernama adit, kalo ada jalankan perintah edit/update, kalo tidak ada
        //tambah data baru / insert
    
            $name = $_POST['name'];
           
         
            if(!isset($_GET['edit'])){
                    $insert = mysqli_query($config, "INSERT INTO majors (name) VALUES ('$name')");
                    header("location:?page=major&tambah=berhasil");
                } else {
                   
                //update data
                $update = mysqli_query($config, "UPDATE majors SET name ='$name' WHERE id = '$id_user'");  
                  if ($update) {
                    header("location:?page=major&ubah=berhasil");
                } 
            }

            }
    if(isset($_GET['edit'])){
        $id_user = $_GET['edit'];
        $queryEdit = mysqli_query($config, "SELECT * FROM majors WHERE id = '$id_user'");
        $dataEdit = mysqli_fetch_assoc($queryEdit);
    }
    

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                   add Majors
                </h5>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Nama Majors</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your name Majors" required value="<?php echo isset($_GET['edit']) ? $dataEdit['name'] : '' ?>">
                    </div>
     
                    <div class="mb-3">
                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>