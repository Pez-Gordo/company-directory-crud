<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM personnel WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $jobTitle = $row['jobTitle'];
            $email = $row['email'];

            
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $jobTitle = $_POST['jobTitle'];
        $email = $_POST['email'];

        $query = "UPDATE personnel set firstName = '$firstName', lastName = '$lastName', jobTitle = '$jobTitle', email = '$email' WHERE id = '$id'";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Employee updated successfully';
        $_SESSION['message_type'] = 'success';
        header("Location: ../../index.php");
    }

?>

<?php include("../header.php") ?>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="../../index.php" class="navbar-brand">PHP-MYSQL-JS&nbsp;&nbsp;&nbsp; <span class="C">C<span class="c" >reate</span></span><span class="C">R<span class="r" >ead</span></span><span class="C">U<span class="u" >pdate</span></span><span class="C">D<span class="d" >elete</span></a>
    </div>
</nav>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="updateEmployee.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="firstName" value="<?php echo $firstName; ?>" class="form-control" placeholder="Update First Name"> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastName" value="<?php echo $lastName; ?>" class="form-control" placeholder="Update Last Name"> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="jobTitle" value="<?php echo $jobTitle; ?>" class="form-control" placeholder="Update Job Title"> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Update Email"> 
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
                    <button class="btn btn-success" name="update">
                        Update

                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../footer.php") ?>