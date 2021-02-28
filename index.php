<?php include("includes/php/db.php") ?>

<?php include("includes/header.php") ?>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="./index.php" class="navbar-brand">PHP-MYSQL-JS&nbsp;&nbsp;&nbsp; <span class="C">C<span class="c" >reate</span></span><span class="C">R<span class="r" >ead</span></span><span class="C">U<span class="u" >pdate</span></span><span class="C">D<span class="d" >elete</span></a>
    </div>
</nav>

<div class="container p-4">

    <div class="row">

        <div class="col-md-3">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body">
                <h3>Create New Employee</h3>
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
                        <!-- Populate <select> options dinamically -->
                        <select name="selectDepartment" id="selectDepartment" class="form-select" placeholder="Select Department">
                            <?php 
                                $query = "SELECT * FROM department ORDER BY name ASC";
                                $result1 = mysqli_query($conn, $query);
                            
                                while($row1 = mysqli_fetch_array($result1)):; 
                            ?>
                            <option value='<?php echo $row1[0];?>'><?php echo $row1[1];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_employee" value="Create Employee">

                </form>
            </div>
            <br>
            <div class="card card-body">
                <h3>Create New Department</h3>
                <form action="./includes/php/insertDepartment.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="department" class="form-control" placeholder="Department" autofocus>
                    </div>
                    <div class="form-group">
                        <select name="select_location" class="form-select" placeholder="Select Location">
                        <!-- Populate <select> options dinamically -->
                        <?php 
                                $query2 = "SELECT * FROM location ORDER BY name ASC";
                                $result2 = mysqli_query($conn, $query2);
                            
                                while($row1 = mysqli_fetch_array($result2)):; 
                            ?>
                            <option value='<?php echo $row1[0];?>'><?php echo $row1[1];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_department" value="Create Department">
                </form>
            </div>
            <br>
            <div class="card card-body">
                <h3>Create New Location</h3>
                <form action="./includes/php/insertLocation.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="location" class="form-control" placeholder="Location" autofocus>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_location" value="Create Location">
                </form>
            </div>
        </div>
        
       
        <div id="tableContainer" class="col-md-9">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnradio1">Staff</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio2">Departments</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio3">Locations</label>
                        </div>
                    </div>
                </nav>
            </div>  
            <!-- Staff Table -->
            <table id="tableStaff" class="table table-bordered">
                <thead>
                    <tr class='header'>
                        <th colspan='6'>Staff</th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Job Title</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    //$query = "SELECT * FROM personnel ORDER BY lastName ASC";
                    $query = "SELECT * FROM personnel INNER JOIN department WHERE personnel.departmentID = department.id ORDER BY lastName ASC";
                    
                    $result_personnel = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_array($result_personnel)) { ?>
                        <tr>
                            <td><?php echo $row['firstName'] ?></td>
                            <td><?php echo $row['lastName'] ?></td>
                            <td><?php echo $row['jobTitle'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['name'] ?></td>
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
            <!-- Departments Table -->
    
            <table id="tableDepartments" class="table table-bordered">
                <thead>
                    <tr class='header'>
                        <th colspan='3'>Departments</th>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <th>Location ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $query = "SELECT * FROM department ORDER BY name ASC";
                    $result_department = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_array($result_department)) { ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['locationID'] ?></td>
                            <td>
                                <a href="./includes/php/updateDepartment.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="./includes/php/deleteDepartment.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Locations Table -->
    
            <table id="tableLocations" class="table table-bordered">
                <thead>
                    <tr class='header'>
                        <th colspan='2'>Locations</th>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $query = "SELECT * FROM location ORDER BY name ASC";
                    $result_department = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_array($result_department)) { ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td>
                                <a href="./includes/php/updateLocation.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="./includes/php/deleteLocation.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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