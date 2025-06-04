<?php
if(isset($_GET['delete'])){
    $id_user = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM instructors WHERE id='$id_user'");
    header("location:?page=instruktur-major&hapus=berhasil");
}
    if(isset($_POST['name'])){
        //ada tidak parameter bernama adit, kalo ada jalankan perintah edit/update, kalo tidak ada
        //tambah data baru / insert
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $education = $_POST['education'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
           
            $id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
            
            if(!isset($_GET['edit'])){
                    $insert = mysqli_query($config, "INSERT INTO instructors (name, gender, education, phone, email, address  ) VALUES ('$name', '$gender', '$education', '$phone', '$email', '$address')");
                    header("location:?page=instruktur-major&tambah=berhasil");
                } else {
                   
                //update data
                $update = mysqli_query($config, "UPDATE instructors SET name ='$name', gender ='$gender', education ='$education' , phone = '$phone' , email = '$email', address ='$address' WHERE id = '$id_user' ");    
                    header("location:?page=instruktur-major&ubah=berhasil");
                } 
            }
        
 $queryMajors = mysqli_query($config, "SELECT * FROM majors ORDER BY id DESC");
 $rowMajors = mysqli_fetch_all($queryMajors, MYSQLI_ASSOC);
 
 $id = isset($_GET['id']) ? $_GET['id'] : '';
 $queryInstructor = mysqli_query($config, "SELECT * FROM instructors WHERE id='$id'");
 $rowinstructor = mysqli_fetch_assoc($queryInstructor);

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                   add instructor Majorv : <?php echo $rowinstructor['name']?> </h5>
                   <div align="right">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Add Instructor Major
</button>
                   </div>
                   
                   <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Major Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                   </table>
            
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="post">

          <div class="modal-body">
            <div class="mb-3">
                <label for="">Major Name</label>
                <select name="id_major" id="" class="form-control">
                    <option value="">Select One</option>
                    <?php foreach ($rowMajors as $rowMajor): ?>
                        <option value="<?php echo $rowMajor['id'] ?>"><?php echo $rowMajor['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
      </form>

    </div>
  </div>
</div>