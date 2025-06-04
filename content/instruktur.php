<?php
    $query = mysqli_query($config, "SELECT * FROM instructors ORDER BY id DESC");
    //12345, 54321
    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
   
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Instruktur</h5>
                <div class="mb-3" align="right">
                    <a href="?page=tambah-instruktur" class="btn btn-primary">Add Instruktur</a>
                </div>
                
                <div class="table-responsive">
                    <!-- nama, email, aksi -->
                     <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Instruktur</th>
                                <th>Jenis Kelamin</th>
                                <th>Pendidikan</th>
                                <th>Nomor_Hp</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $index => $row): ?>
                            <tr>
                                <td><?php echo $index += 1; ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['education'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td>
                                    <a href="?page=tambah-instruktur&edit=<?php echo $row['id'] ?>"
                                        class="btn btn-primary">Edit</a>
                                        <a onclick ="return confirm ('Are you sure wanna delete this data?')"
                                        class="btn btn-danger" name="delete" href="?page=tambah-instruktur&delete=<?php echo $row['id'] ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                     </table>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>