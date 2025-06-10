<?php
$query = mysqli_query($config, "SELECT majors.name as major_name, instructors.name as instructor_name, moduls.* FROM moduls LEFT JOIN majors ON majors.id = moduls.id_major LEFT JOIN instructors ON instructors.id = moduls.id_instructor ORDER BY moduls.id DESC");

//12345, 54321
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Moduls</h5>
                <div class="mb-3" align="right">
                    <a href="?page=tambah-modul" class="btn btn-primary">Add Modul</a>
                </div>

                <div class="table-responsive">
                    <!-- nama, email, aksi -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>instructor</th>
                                <th>Major</th>
                                <th>Title</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $index => $row): ?>
                                <tr>
                                    <td><?php echo $index += 1; ?></td>
                                    <td><?php echo $row['instructor_name'] ?></td>
                                    <td><?php echo $row['major_name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td>
                                        <a href="?page=tambah-modul&edit=<?php echo $row['id'] ?>"
                                            class="btn btn-primary">Edit</a>
                                        <a onclick="return confirm ('Are you sure wanna delete this data?')"
                                            class="btn btn-danger" name="delete" href="?page=tambah-user&delete=<?php echo $row['id'] ?>">Delete</a>
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