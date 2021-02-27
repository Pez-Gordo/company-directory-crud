<?php include("includes/php/db.php") ?>

<?php include("includes/header.php") ?>
    
<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body">

                <form action="./includes/php/insertEmployee.php" method="POST">

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="surname" class="form-control" placeholder="Surname">
                    </div>
                    <div class="form-group">
                        <input type="text" name="job" class="form-control" placeholder="Job Title">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <select name="select_department" class="form-select" placeholder="Select Department">
                            <option value="default">Select Department</option>
                            <option value="marketing">Marketing</option>
                            <option value="engineering">Engineering</option>
                            <option value="sales">Sales</option>
                            <option value="support">Support</option>
                            <option value="accounting">Accounting</option>
                            <option value="web_development">Web Development</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_employee" value="Save Employee">

                </form>

            </div>

        </div>

        <div class="col-md-8">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Job Title</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $query = "SELECT * FROM personnel";
                        $result_personnel = mysqli_query($conn, $query);
                        
                        while($row = mysqli_fetch_array($result_personnel)) { ?>
                            <tr>
                                <td><?php echo $row['firstName'] ?></td>
                                <td><?php echo $row['lastName'] ?></td>
                                <td><?php echo $row['jobTitle'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td>
                                    <a href="./includes/php/updateEmployee.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="./includes/php/deleteEmployee.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
        </div>

    </div>

</div>

<?php include("includes/footer.php") ?>